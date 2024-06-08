<?php

namespace App\Imports;

use App\helpers\HelpExcel;
use App\helpers\Myhelp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PersonalImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $countfilas = session('CountFilas', 0);
            $contar1 = session('contar1', 0);
            $contar2 = session('contar2', -1);
            $contar3 = session('contar3', 0);
            $contar4 = session('contar4', 0);
            $contar5 = session('contar5', 0);
            $contarVacios = session('contarVacios', 0);

            session(['larow' => $row]);

            //# validaciones
            if (!$this->Requeridos($row)) {
                session(['contarVacios' => ++$contarVacios]);
                return null;
            }

            if (User::where('email', $row[1])->exists()) {
                session(['contar1' => ++$contar1]);
                return null;
            }
            if (User::where('identificacion', $row[2])->exists()) {
                session(['contar5' => ++$contar5]);
                return null;
            }

            if (strtolower(trim($row[0])) === 'nombre' || strtolower(trim($row[0])) == '') { //saltar 1 fila
                session(['contar2' => ++$contar2]);
                return null;
            }
            if (!is_numeric($row[2])) {
                session(['contar3' => ++$contar3]);
                return null;
            }
            if (strtolower($row[3]) != 'femenino' && strtolower($row[3]) != 'masculino' && strtolower($row[3]) != 'otro') {
                session(['contar4' => ++$contar4]);
                return null;
            }

            if (strtolower($row[7]) != 'trabajador' && strtolower($row[7]) != 'profesor') {
                session(['contar4' => ++$contar4]);
                return null;
            }
            //# fin validaciones

            session(['CountFilas' => $countfilas + 1]);
            $fechaNacimiento = HelpExcel::getFechaExcel($row[4])->format('Y-m-d H:i');

            $user = new User([
                'name'     => $row[0],
                'email'    => $row[1],
                'identificacion' => intval($row[2]),
                'sexo' => $row[3],
                'fecha_nacimiento' => $fechaNacimiento,
                'semestre' => $row[5],
                'pgrado' => $row[6],

                'password' => Hash::make($row[2]),
            ]);
            // dd($fechaNacimiento,$row[7], strtolower(trim($row[0])) === 'nombre');
            $user->assignRole($row[7]);


            return $user;
        } catch (\Throwable $th) {
            Myhelp::EscribirEnLog($this, 'IMPORT:users', ' Fallo dentro de la importacion: ' . $th->getMessage() . ' L:' . $th->getLine() . ' Ubi: ' . $th->getFile(), false);
        }
    }

    public function Requeridos($theRow)
    {
        foreach ($theRow as $value) {
            if (is_null($value) || $value === '')
                return false;
        }
        if (!is_string($theRow[0])) return false;
        if (!is_int(intval($theRow[2]))) return false;

        return true;
    }
}

