<?php

namespace App\helpers;

class CargosModelos {

    public static function CargosYModelos() {
        $crudSemiCompleto = ['update', 'read', 'create','download','sugerencia','firmar'];
        $crudCompleto = array_merge(['delete'], $crudSemiCompleto);
        
        $nombresDeCargos = [////JUSTthisPROJECT
            'lider',//1
            'administrativo',//2
        ];//recuerda userseeder, RoleSeeder
        $isSome = [];
        foreach ($nombresDeCargos as $key => $value) {
            $isSome[] = 'is' . $value;
        }
        
        $elcore = 'formulario'; ////JUSTthisPROJECT
        $Models = [
            'role',
            'permission',
            'user',
            'parametro',

            $elcore,
            'actividades',
            'categoria',
            'estadoformulario',
            'lineadelplan',
            'planmejoramientonecesidad',
            'proceso_que_solicita_presupuesto',
            'vigencias_anteriores',
        ];
        
        $fullCrud = [ ////JUSTthisPROJECT
            'administrativo' => ['user', $elcore, 'area']
        ];
        return [
            'nombresDeCargos' => $nombresDeCargos,
            'Models' => $Models,
            'isSome' => $isSome,
            'core' => $elcore,
            'fullCrud' => $fullCrud,
            'crudCompleto' => $crudCompleto,
            'crudSemiCompleto' => $crudSemiCompleto,
        ];
    }
}
?>
