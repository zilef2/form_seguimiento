<?php

namespace App\Http\Controllers;

use App\helpers\Myhelp;
use App\helpers\MyModels;
use App\Models\EstadoFormulario;
use App\Models\Formulario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class FormSimplificadoController extends FormularioController
{
    public function PreFormSimplificado()
    {
        $numberPermissions = MyModels::getPermissionToNumber(Myhelp::WriteAuthLog($this, ' IndexFormSimplificado '));
        $esteanio = Carbon::today()->year;
        $ArrayIdentificaciones = Formulario::Where('enviado', 1)
            ->WhereYear('created_at',$esteanio)
            ->pluck('identificacion_user'); //cambiar a enviado 1

        $Arraylideres = User::WhereIn('identificacion', $ArrayIdentificaciones)
            ->WhereNot('name','Superadmin')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'label' => $user->name
                ];
            });
        /*
            estado' => 1, 'nombre' => 'Sin revisar']);
            estado' => 2, 'nombre' => 'Aprobado']);
            estado' => 3, 'nombre' => 'Rechazado']);
            estado' => 4, 'nombre' => 'Sugerencia']);
         */

        return Inertia::render($this->FromController . '/PreFormSimplificado', [
            'numberPermissions' => $numberPermissions,
            'Arraylideres' => $Arraylideres,
            'estadosFormulario' => EstadoFormulario::all()->toArray(),
//            'cedLideres' => Inertia::lazy(fn() => $cedlideres),
        ]);
    }

    private function MapearSimplificado($formus)
    {
        $valorTotal = clone $formus;
//        $valorTotal =  $valorTotal->sum('valor_total_solicitatdo_por_necesidad');
        $valorTotal = $formus->get()->sum(function ($formu) {
            if ($formu->estado == 4) {
                return $formu->valor_total_solicitatdo_por_necesidad_sugerida;
            } else {
                return $formu->valor_total_solicitatdo_por_necesidad;
            }
        });

//        $formus = $formus->orderBy('estado','desc');
//        $formus = $formus->orderBy('estado', 'asc')->get();
//        dd(
//            $formus[0]->getattributes(),
//            $formus[1]->getattributes()
//        );
        $formuResult = $formus->get()->map(function ($form) {
            $form->userName = $form->userName();
            $form->Categori = $form->categoria();
            $form->proceso_que_solicita_presupuest = $form->proceso_que_solicita_presupuesto();

            $form->procesos_involucrado = $form->BDToString('procesos_involucrados');
            $form->plan_de_mejoramiento_al_que_apunta_la_necesida = $form->BDToString('plan_de_mejoramiento_al_que_apunta_la_necesidad');
            $form->linea_del_plan_desarrollo_al_que_apunta_la_necesida = $form->BDToString('linea_del_plan_desarrollo_al_que_apunta_la_necesidad');
            return $form;
        });

        return [$formuResult,$valorTotal];
    }

    public function FiltrosSimplificado(&$formularios, $request)
    {
        if ($request->has('search')) {
            $formularios = $formularios->where(function ($query) use ($request) {
                $query->where('necesidad', 'LIKE', "%" . $request->search . "%")
                    ->orWhere('justificacion', 'LIKE', "%" . $request->search . "%")
                    ->orWhere('nombre', 'LIKE', "%" . $request->search . "%")
                    ->orWhere('valor_unitario', 'LIKE', "%" . $request->search . "%")//                    ->orWhere('identificacion', 'LIKE', "%" . $request->search . "%")
                ;
            });
        }
        if ($request->has('searcLider') || $request->has('liderchu')) {
            $lacedula = $request->searcLider ?: $request->liderchu;
            $formularios = $formularios->where(function ($query) use ($lacedula) {
                $query->where('identificacion_user', 'LIKE', "%" . $lacedula . "%")
                ;
            });
        }

        $searchFieldsLikeit = ['Backcat' ];
        $BDFieldsLikeit = ['categoria'];
        foreach ($searchFieldsLikeit as $index => $field) {
            if ($request->has($field)) {
                $formularios = $formularios->where(function ($query) use ($request, $field,$BDFieldsLikeit,$index) {
                    $query->where($BDFieldsLikeit[$index], 'LIKE', "%" . $request->$field . "%");
                });
            }
        }

        if ($request->has('SoloEnviados') && $request->SoloEnviados !== 'Todos') {
            $soloEnviados = $request->SoloEnviados;
            $envi = 0;
            if ($soloEnviados === 'enviados') $envi = 1;
            $formularios = $formularios->where(function ($query) use ($request, $envi) {
                $query->where('enviado', $envi);
            });
        }

        if ($request->has(['field', 'order'])) {
            if($request->field == 'numero_necesidad'){
//                $formularios = $formularios->orderBy('estado');
                $formularios = $formularios->orderBy(DB::raw('CAST(numero_necesidad AS UNSIGNED)'), $request->order);
            }else{
                $formularios = $formularios->orderBy($request->field, $request->order);
            }
        }
        $formularios = $formularios->orderBy('estado', 'asc');
    }
    public function IndexFormSimplificado(Request $request,$idLider)
    {
        $numberPermissions = MyModels::getPermissionToNumber(Myhelp::WriteAuthLog($this, ' IndexFormSimplificado '));
        $lider = User::find($idLider);
        $formus = Formulario::Where('user_id',$idLider);

        $this->FiltrosSimplificado($formus, $request);
        [$formularios,$totalValorUnitario] = $this->MapearSimplificado($formus);
        $losSelect = $this->Dependencias();

        $perPage = $request->has('perPage') ? $request->perPage : 1000;
        $total = $formularios->count();
        $page = request('page', 1); // Current page number
        $fromController = new LengthAwarePaginator(
            $formularios->forPage($page, $perPage),
            $total,
            $perPage,
            $page,
            ['path' => request()->url()]
        );
        return Inertia::render($this->FromController . '/IndexFormSimplificado', [
            'numberPermissions' => $numberPermissions,
            'fromController' => $fromController,
            'total' => $formularios->count(),
            'breadcrumbs' => [['label' => __('app.label.' . $this->FromController), 'href' => route($this->FromController . 'SA')]],
            'title' => __('app.label.' . $this->FromController),
            'filters' => $request->all(['search', 'field', 'order','soloEnviados','searcLider','liderchu']),
            'perPage' => (int)$perPage,
            'losSelect' => $losSelect,
            'lider' => $lider,
            'estadosFormulario' => EstadoFormulario::all()->toArray(),
            'totalValorUnitario' => (int) $totalValorUnitario,
        ]);
    }

    public function formularioupdate2(Request $request,$fid){
        try {
            Myhelp::EscribirEnLog($this, ' formularioupdate2 : formu');
            $formulario = Formulario::Find($fid);
            DB::beginTransaction();
            $formulario->update([
                'cantidad_sugerida' => $request->cantidad_sugerida,
                'valor_unitario_sugerida' => $request->valor_unitario_sugerida,
                'valor_total_solicitatdo_por_necesidad_sugerida' => $request->valor_total_solicitatdo_por_necesidad_sugerida,
                'estado' => 4, //Sugerencia
            ]);

            DB::commit();
            return redirect()->route('IndexFormSimplificado', ['idLider' => $request->liderId])->with('success','Sugerencia éxitosa');
        } catch (QueryException $e) {
            $mensajeErrorCompleto = "Error SQL: " . $e->getMessage() . "\n" .
                "SQL: " . $e->getSql() . "\n" .
                "Bindings: " . json_encode($e->bindings) . "\n" .
                "Ubicación: " . $e->getFile() . ":" . $e->getLine();
            Myhelp::EscribirEnLog($this, ' ERRORFORMU: ' . ($mensajeErrorCompleto));
            return back()->with('error', $mensajeErrorCompleto);

        } catch (\Throwable $th) {
            DB::rollback();
            $mensajeErrorCompleto = $th->getMessage() . ' L:' . $th->getLine() . ' | Ubi: ' . $th->getFile();
            Myhelp::EscribirEnLog($this, ' ERRORFORMU: ' . ($mensajeErrorCompleto));
            return back()->with('error', $mensajeErrorCompleto);
        }
    }
}
