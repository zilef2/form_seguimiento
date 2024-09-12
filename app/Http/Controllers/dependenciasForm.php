<?php

namespace App\Http\Controllers;

use App\helpers\MyConst;
use App\helpers\Myhelp;
use App\Models\actividades;
use App\Models\Formulario;
use App\Models\SMultiple;
use App\Models\User;

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

        return $Selects;
    }
//    public function Dependencias2(){
//        $Selects['proceso_que_solicita_presupuesto'] = Myhelp::nombreYvalueNew('proceso_que_solicita_presupuesto');
//        $Selects['planmejoramientonecesidad'] = Myhelp::nombreYvalueNew('planmejoramientonecesidad');
//        $Selects['lineadelplan'] = Myhelp::nombreYvalueNew('lineadelplan');
//        $Selects['categorias'] = Myhelp::vSelect('categorias');
//
//
//        $Selects['unidad_de_medida'] = Myhelp::nombreYvalue('unidad_de_medida');
//        $Selects['periodo_de_inicio_de_ejecucion'] = Myhelp::nombreYvalue('periodo_de_inicio_de_ejecucion');
//        $Selects['vigencias_anteriores'] = Myhelp::nombreYvalue('vigencias_anteriores');
//        $Selects['frecuencia_de_uso'] = Myhelp::nombreYvalue('frecuencia_de_uso');
//        $Selects['mantenimientos_requeridos'] = Myhelp::nombreYvalue('mantenimientos_requeridos');
//        $Selects['capacidad_instalada'] = Myhelp::nombreYvalue('capacidad_instalada');
//        $Selects['riesgo_de_la_inversion'] = Myhelp::nombreYvalue('riesgo_de_la_inversion');
//
//        $formu = new Formulario();
//        $todasCat = $formu->ListarCategoria();
//        $Selects['ListarCategoria'] = $todasCat;
//
//        $usergenerico = new User();
//        $todasCat = $usergenerico->ListarLideres();
//        $Selects['todasLideres'] = $todasCat;
//
//        return $Selects;
//    }

    public function dependencias2Multiples()
    {
        $Selects = [];
//        $Selects['unidad_de_medida'] = Myhelp::nombreYvalue('unidad_de_medida');
//        dd($Selects);
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
        $Selects['riesgo_de_la_inversion'] = Myhelp::nombreYvalue('riesgo_de_la_inversion');
        return $Selects;
    }

    public function seleccionMultiple($request,$atributo,$elform)
    {
    //     dd($elform,
    //     $elform->id
    // );
        try {
            foreach ($request->{$atributo} as $index => $item) {
//        if(is_array($item) && !isset($item['value']))dd($item);
                SMultiple::create([
                    'tipo' => 'procesos_involucrados',
                    'value' => $item['value'],
//                'value' => $item,
                    'formulario_id' => $elform->id,
                ]);
            }
        } catch (\Throwable $e) {
             dd($item);
            $mensajeErrorCompleto = "function seleccionMultiple: " . $e->getMessage() . "\n" .
                "SQL: " . $e->sql . "\n" .
                "Bindings: " . json_encode($e->bindings) . "\n" .
                "Ubicación: " . $e->getFile() . ":" . $e->getLine();
            Myhelp::EscribirEnLog($this, ' ERROR_FORMU_FINAL: ' . $mensajeErrorCompleto);
            return back()->with('error', __('app.label.created_error', ['name' => 'Formulario: ']) . $mensajeErrorCompleto);
        }
    }
}
