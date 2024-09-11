<?php

namespace App\Http\Controllers;

use App\helpers\Myhelp;
use App\helpers\MyModels;
use App\Http\Requests\FormularioOneStoreRequest;
use App\Models\Formulario;
use App\Models\SMultiple;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FormuController extends Controller
{
    public string $FromController = 'formulario';

    public function index(Request $request)
    {
        return Redirect::route('formularioSA');
    }

    public function store(FormularioOneStoreRequest $request){
        try {
            Myhelp::EscribirEnLog($this, ' Beginning store(Guardar):formul');
            $authu = Myhelp::AuthU();
            $todosMisForm = Formulario::all();
            $laUltimaNecesidad = 0;
            if ($todosMisForm) {
                if ($todosMisForm->last())
                    $laUltimaNecesidad = $todosMisForm->last()->numero_necesidad;
            }

            DB::beginTransaction();
            $formulario = Formulario::create([
                'Nombre' => $request->Nombre,
                'identificacion_user' => $authu->identificacion,
                'user_id' => $authu->id,
                'valor_total_de_la_solicitud_actual' => 0,
                'numero_necesidad' => $laUltimaNecesidad + 1,
                'necesidad' => $request->necesidad,
                'justificacion' => $request->justificacion,
                'actividad' => $request->actividad,
                'categoria' => $request->categoria['name'],
                'unidad_de_medida' => $request->unidad_de_medida['value'],
                'cantidad' => $request->cantidad,
                'valor_unitario' => $request->valor_unitario,
                'valor_total_solicitatdo_por_necesidad' => $request->valor_total_solicitatdo_por_necesidad,
                'periodo_de_inicio_de_ejecucion' => $request->periodo_de_inicio_de_ejecucion['value'],
                'vigencias_anteriores' => $request->vigencias_anteriores['value'],
                'valor_asignado_en_la_vigencia_anterior' => $request->valor_asignado_en_la_vigencia_anterior,
                'enviado' => 0,
                'estado' => 0,
            ]);

            DB::commit();
            return redirect()->route('Store2', ['fid' => $formulario->id])->with('success','Se ha guardado la 1ra Parte');
        } catch (QueryException $e) {
            $mensajeErrorCompleto = "Error SQL: " . $e->getMessage() . "\n" .
                "SQL: " . $e->sql . "\n" .
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
    

    //get
    public function GetStore2($fid)
    {
        $numberPermissions = MyModels::getPermissionToNumber(Myhelp::WriteAuthLog($this, ' --formularios GetStore2-- '));
        $dependenciasForm = new dependenciasForm();

        return Inertia::render($this->FromController . '/CreateWindow2', [
            'formularioGuardado' => Formulario::Find($fid),
            'breadcrumbs' => [
                [
                    'label' => __('app.label.' . $this->FromController),
                    'href' => route($this->FromController . '.create')]
                ],
            'title' => __('app.label.' . $this->FromController),
            'numberPermissions' => $numberPermissions,
            'losSelect' => $dependenciasForm->dependencias2Multiples(),
        ]);
    }

    //post
    public function PostStore2(Request $request, $fid): \Illuminate\Http\RedirectResponse //todo: poner validaciones de backend
    {
        try {
            Myhelp::EscribirEnLog($this, ' Beginning store(Guardar):formul');
            $dependenciasForm = new dependenciasForm();
            $authu = Myhelp::AuthU();
            $elform = Formulario::Find($fid);
            $validarYaSeEjecuto = SMultiple::Where('tipo', 'procesos_involucrados')
                    ->Where('formulario_id', $fid)
                    ->count() !== 0;

            if($validarYaSeEjecuto){
            return redirect()->route('formularioSA')
                ->with(['error' => 'Ya se ha diligenciado este formulario']);
            }

            DB::beginTransaction();

            $dependenciasForm->seleccionMultiple($request,'procesos_involucrados',$elform);
            $dependenciasForm->seleccionMultiple($request,'plan_de_mejoramiento_al_que_apunta_la_necesidad',$elform);
            $dependenciasForm->seleccionMultiple($request,'linea_del_plan_desarrollo_al_que_apunta_la_necesidad',$elform);
            $dependenciasForm->seleccionMultiple($request,'riesgo_de_la_inversion',$elform);

            $elform->update([
               'frecuencia_de_uso' => $request->frecuencia_de_uso['value'],
               'mantenimientos_requeridos' => $request->mantenimientos_requeridos['value'],
               'capacidad_instalada' => $request->capacidad_instalada,
            ]);

            DB::commit();
            return redirect()->route('formulario.create')->with(['success' => 'Éxito. Desea agregar mas necesidades?']);
        } catch (QueryException $e) {
            $mensajeErrorCompleto = "Error SQL: " . $e->getMessage() . "\n" .
                "SQL: " . $e->sql . "\n" .
                "Bindings: " . json_encode($e->bindings) . "\n" .
                "Ubicación: " . $e->getFile() . ":" . $e->getLine();
            Myhelp::EscribirEnLog($this, ' ERROR_FORMU_FINAL: ' . $mensajeErrorCompleto);
            return back()->with('error', __('app.label.created_error', ['name' => 'Formulario: ']) . $mensajeErrorCompleto);
        } catch (\Throwable $th) {
            DB::rollback();
            $mensajeErrorCompleto = $th->getMessage() . ' L:' . $th->getLine() . ' | Ubi: ' . $th->getFile();
            Myhelp::EscribirEnLog($this, ' ERROR_FORMU_FINAL: ' . $mensajeErrorCompleto);
            return back()->with('error', __('app.label.created_error', ['name' => 'Formulario: ']) . $mensajeErrorCompleto);
        }
    }

}
