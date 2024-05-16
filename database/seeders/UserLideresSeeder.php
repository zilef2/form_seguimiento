<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserLideresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $buscarLideres = User::WhereBetween('id',[1000,1033])->get();
        foreach ($buscarLideres as $key => $value) {
            $value->assignRole('lider');
        }
    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=NombreDeLaSeeder
php artisan db:seed --class=UserLideresSeeder
*/
