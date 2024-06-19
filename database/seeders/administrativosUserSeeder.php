<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class administrativosUserSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $users = [
            [
                'name' => 'JORGE WILLIAM ARREDONDO ARANGO',
                'identificacion' => '123',
                'area' => 'VICERRECTOR FINANCIERO',
                'agregado' => '',
                'sexo' => 'Masculino',
                'email' => 'viceadministrativa@colmayor.edu.co'
            ],
            [
                'name' => 'MANUELA SEPULVEDA GIRALDO',
                'identificacion' => '124',
                'area' => 'Sin cargo',
                'agregado' => '',
                'sexo' => 'Femenino',
                'email' => 'manuela.sepulveda@colmayor.edu.co'
            ],
            [
                'name' => 'LUIS FELIPE GONZALES AGUDELO',
                'identificacion' => '125',
                'area' => 'DIRECTOR PLANEACIÓN',
                'agregado' => '',
                'sexo' => 'Masculino',
                'email' => 'direccion.planeacion@colmayor.edu.co'
            ],
            [
                'name' => 'LINA MARIA MEJIA VELEZ',
                'identificacion' => '32180511',
                'area' => 'PROFESIONAL PLANEACIÓN',
                'agregado' => '126',
                'sexo' => 'Femenino',
                'email' => 'lina.mejia@colmayor.edu.co'
            ],
            [
                'name' => 'JACKELINE CUELLO',
                'identificacion' => '127',
                'area' => 'PROFESIONAL PLANEACIÓN',
                'agregado' => '',
                'sexo' => 'Femenino',
                'email' => 'jackeline.cuello@colmayor.edu.co'
            ],
        ];

        try {
            
            DB::beginTransaction();
            // $genero = 'Femenino';
            foreach ($users as $user) {
                $cedula = $user['identificacion'];
                $nombre = $this->getFirstWord($user['name']);
                $nuevoUsuario = User::create([
                    'name' => $user['name'],
//                'email' => strtolower(str_replace(' ', '', $user['name'])) . '@colmayor.edu.co',
                    'email' => $user['email'],
                    'identificacion' => $cedula,
                    'password' => bcrypt($nombre . '+Presupuesto'), //JACKELINE+Presupuesto  LUIS+Presupuesto
                    'area' => $user['area'],
                    'agregado' => $user['agregado'],
                    'sexo' => $user['sexo'],

                    'fecha_nacimiento' => '1990-01-01',
                    'celular' => '1',
                    'esLider' => 0,
                ]);
                $nuevoUsuario->assignRole('administrativo');
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    function getFirstWord($string)
    {
        // Divide el string por espacios vacíos
        $words = explode(' ', $string);
        // Devuelve el primer elemento del array resultante
        return $words[0];
    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=administrativosUserSeeder
*/
