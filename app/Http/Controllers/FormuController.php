<?php

namespace App\Http\Controllers;

use App\helpers\Myhelp;
use App\helpers\MyModels;
use App\Http\Requests\FormularioOneStoreRequest;
use App\Models\Formulario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class FormuController extends Controller
{
    public string $FromController = 'formulario';
    
    public function store(FormularioOneStoreRequest $request){
        try {
            Myhelp::EscribirEnLog($this, ' Beginning store(Guardar):formul');
            $authu = Myhelp::AuthU();
            $todosMisForm =  Formulario::all();
            $laUltimaNecesidad = 1;
            if($todosMisForm){
                if($todosMisForm->last())
                    $laUltimaNecesidad = $todosMisForm->last()->numero_necesidad;
            }
            DB::beginTransaction();
            $formulario = Formulario::create([
                'identificacion_user' => $authu->identificacion,
                'user_id' => $authu->id,
                'numero_necesidad' => $laUltimaNecesidad + 1,
                'valor_total_de_la_solicitud_actual' => 0,
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
            ]);
            
            DB::commit();

            $numberPermissions = MyModels::getPermissionToNumber(Myhelp::WriteAuthLog($this, ' --formularios index-- '));
            $dependenciasForm = new dependenciasForm();
    
            return Inertia::render($this->FromController . '/CreateWindow2', [
                'fid' => $formulario->id,
                'breadcrumbs' => [['label' => __('app.label.' . $this->FromController), 'href' => route($this->FromController . '.create')]],
                'title' => __('app.label.' . $this->FromController),
                'numberPermissions' => $numberPermissions,
                'losSelect' => $dependenciasForm->Dependencias2(),
            ]);
            
//            $formulario
//            return back()->with('success', __('app.label.firstPart'));
        } catch (\Throwable $th) {
            DB::rollback();
            $mensajeErrorCompleto = $th->getMessage() . ' L:' . $th->getLine() . ' | Ubi: ' . $th->getFile();
            Myhelp::EscribirEnLog($this, ' ERRORFORMU: ' . $mensajeErrorCompleto);
            return back()->with('error', __('app.label.created_error', ['name' => 'Formulario1: ']) . $mensajeErrorCompleto);
        }
    }

}
