<?php

namespace App\helpers;

use App\Models\User;
use Carbon\Carbon;
use Carbon\Translator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CargosModelos {

    //JUST THIS PROJECT
    public static function CargosYModelos() {
        //otros cargos NO_ADMIN
        $nombresDeCargos = [
            'administrativo',
            'lider',
        ];
        $isSome = [];
        foreach ($nombresDeCargos as $key => $value) {
            $isSome[] = 'is' . $value;
        }
        //arrrays for easyway
        $Models = [
            'role',
            'permission',
            'user',

            'formulario',//core
        ];
        return [
            'nombresDeCargos' => $nombresDeCargos,
            'Models' => $Models,
            'isSome' => $isSome,
        ];
    }

    public static function getPermissionToNumber($permissions){

        if ($permissions === 'administrativo') return 1;
        if ($permissions === 'lider') return 2;


        if ($permissions === 'admin') return 90;
        if ($permissions === 'superadmin') return 100;
        return 0;
    }
}

?>
