<?php

namespace App\Http\Controllers;

use App\helpers\MyConst;
use App\helpers\Myhelp;
use App\Models\actividades;
use App\Models\Formulario;
use App\Models\SMultiple;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class dependenciasForm extends Controller
{
    public function Dependencias()
    {
        $Selects['proceso_que_solicita_presupuesto'] = Myhelp::nombreYvalueNew('proceso_que_solicita_presupuesto');
        $Selects['planmejoramientonecesidad'] = Myhelp::nombreYvalueNew('planmejoramientonecesidad');
        $Selects['lineadelplan'] = Myhelp::nombreYvalueNew('lineadelplan');
//        $Selects['actividades'] = Myhelp::nombreYvalueNew('actividades');
        $Selects['categorias'] = Myhelp::vSelect('categorias');


        $Selects['unidad_de_medida'] = Myhelp::nombreYvalue('unidad_de_medida');
        $Selects['periodo_de_inicio_de_ejecucion'] = Myhelp::nombreYvalue('periodo_de_inicio_de_ejecucion');
        $Selects['vigencias_anteriores'] = Myhelp::nombreYvalue('vigencias_anteriores');
        $Selects['frecuencia_de_uso'] = Myhelp::nombreYvalue('frecuencia_de_uso');
        $Selects['mantenimientos_requeridos'] = Myhelp::nombreYvalue('mantenimientos_requeridos');
        $Selects['capacidad_instalada'] = Myhelp::nombreYvalue('capacidad_instalada');
        $Selects['riesgo_de_la_inversion'] = Myhelp::nombreYvalue('riesgo_de_la_inversion');

        $formu = new Formulario();
        $todasCat = $formu->ListarCategoria();
        $Selects['ListarCategoria'] = $todasCat;

//        $Selects['actividades'] = actividades::all()->pluck('');
        $usergenerico = new User();
        $todasCat = $usergenerico->ListarLideres();
        $Selects['todasLideres'] = $todasCat;
        
        
        
        //zona multiples (2nda parte del edit)
        $dependenciasForm = new dependenciasForm();
        $Selects = array_merge($Selects,$dependenciasForm->dependencias2Multiples());
        

        return $Selects;
    }

    public function dependencias2Multiples()
    {
        $Selects = [];
        $temporal = MyConst::procesos_involucrados();
        foreach ($temporal as $index => $item) {
            $Selects['procesos_involucrados'][] = [
                'label' => $item,
                'value' => $index,
            ];
        }
        $temporal = MyConst::plan_de_mejoramiento_al_que_apunta_la_necesidad();
        foreach ($temporal as $index => $item) {
            $Selects['plan_de_mejoramiento_al_que_apunta_la_necesidad'][] = [
                'label' => $item,
                'value' => $index,
            ];
        }
        $temporal = MyConst::linea_del_plan_desarrollo_al_que_apunta_la_necesidad();
        foreach ($temporal as $index => $item) {
            $Selects['linea_del_plan_desarrollo_al_que_apunta_la_necesidad'][] = [
                'label' => $item,
                'value' => $index,
            ];
        }
        $Selects['frecuencia_de_uso'] = Myhelp::nombreYvalue('frecuencia_de_uso');
        $Selects['mantenimientos_requeridos'] = Myhelp::nombreYvalue('mantenimientos_requeridos');
        $Selects['capacidad_instalada'] = Myhelp::nombreYvalue('capacidad_instalada');
        $Selects['riesgo_de_la_inversion'] = Myhelp::TheIdAndLabel('riesgo_de_la_inversion');
        return $Selects;
    }
    
    public function RecuperarSeleccionMultiple($atributo,$elform){
        $multiple = SMultiple::Where('tipo', $atributo)->Where('formulario_id',$elform->id)->get();
        $result = [];
        
        $elvectorConstante = MyConst::{$atributo}();
        if($multiple){
            $contador = 0;
            foreach ($multiple as $index => $item) {
                $valu = $elvectorConstante[$item->value];
                $result[$contador]['label'] = $valu;
                $contador++;
            }
        }
        return $result;
    }

    public function GuardarSeleccionMultiple($request, $atributo, $elform){
        try {
            DB::beginTransaction();
            foreach ($request->{$atributo} as $index => $item) {
                SMultiple::create([
                    'tipo' => $atributo,
                    'value' => $item['value'],
                    'formulario_id' => $elform->id,
                ]);
            }
        }catch (\Throwable $th) {
            DB::rollback();
            $mensajeErrorCompleto = $th->getMessage() . ' L:' . $th->getLine() . ' | Ubi: ' . $th->getFile();
            Myhelp::EscribirEnLog($this, ' ERRORFORMULARIOS: '. $mensajeErrorCompleto);

            return back()->with('error', __('app.label.created_error', ['name' => 'Formulario: ']) . $mensajeErrorCompleto);
        }
    }
    

    public function ActualizarSeleccionMultiple($request, $atributo, $elform){
        try {
            DB::beginTransaction();
            foreach ($request->{$atributo} as $item) {
                if(!isset($item['value']))dd(
                    $item
                );
                SMultiple::updateOrCreate([
                    'formulario_id' => $elform->id,
                    'value' => $item['value'],
                    'tipo' => $atributo,
                ]);
            }
        }catch (\Throwable $th) {
            DB::rollback();
            $mensajeErrorCompleto = $th->getMessage() . ' L:' . $th->getLine() . ' | Ubi: ' . $th->getFile();
            Myhelp::EscribirEnLog($this, ' ERRORFORMULARIOS: '. $mensajeErrorCompleto);

            return back()->with('error', __('app.label.created_error', ['name' => 'Formulario: ']) . $mensajeErrorCompleto);
        }
    }
    
    
    
    
}
