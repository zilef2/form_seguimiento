<?php

namespace App\Http\Controllers;

use App\helpers\Myhelp;
use App\Models\actividades;
use App\Models\Formulario;
use App\Models\User;
use Illuminate\Http\Request;

class dependenciasForm extends Controller
{
    public function Dependencias(){
        //estaban en el frontend
        $Selects['proceso_que_solicita_presupuesto'] = Myhelp::nombreYvalue('proceso_que_solicita_presupuesto');
        //FIN: estaban en el frontend
        
        
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
        
        $Selects['actividades'] = actividades::all()->pluck('');
        $usergenerico = new User();
        $todasCat = $usergenerico->ListarLideres();
        $Selects['todasLideres'] = $todasCat;
        
        return $Selects;
    }
    
    public function dependenciasMultiples(){
//        $Selects['riesgo_de_la_inversion'] = $this->nombreYvalue('riesgo_de_la_inversion');
//
//        $formu = new Formulario();
//        $todasCat = $formu->ListarCategoria();
//        $Selects['ListarCategoria'] = $todasCat;
//        
//        $usergenerico = new User();
//        $todasCat = $usergenerico->ListarLideres();
//        $Selects['todasLideres'] = $todasCat;
        
//        return $Selects;
    }
}
