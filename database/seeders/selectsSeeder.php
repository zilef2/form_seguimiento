<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class selectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //falta actividad, esta pendiente por definir
        DB::table('selecsForm')->insert(['nombre' =>'Meses', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insert(['nombre' =>'Unidades', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insert(['nombre' =>'Otras', 'tipo' => 'unidad_de_medida',]);


        DB::table('selecsForm')->insert([ 'nombre'=>'Enero a marzo', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        DB::table('selecsForm')->insert([ 'nombre'=>'Abril a junio', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        DB::table('selecsForm')->insert([ 'nombre'=>'Julio a septiembre', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        DB::table('selecsForm')->insert([ 'nombre'=>'Septiembre a octubre', 'tipo' => 'periodo_de_inicio_de_ejecucion']);


        DB::table('selecsForm')->insert(['nombre' =>'24/7 (permanentemente)', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insert(['nombre' =>'Días estipulados en el contrato', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insert(['nombre' =>'Todos los días hábiles del año', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insert(['nombre' =>'Una vez al mes', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insert(['nombre' =>'Varias veces al mes', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insert(['nombre' =>'Una vez por semestre', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insert(['nombre' =>'Varias veces al semestre', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insert(['nombre' =>'Eventos específicos del año', 'tipo' => 'frecuencia_de_uso']);


        DB::table('selecsForm')->insert(['nombre' =>'Diario', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insert(['nombre' =>'Semanal', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insert(['nombre' =>'Mensual', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insert(['nombre' =>'Semestral', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insert(['nombre' =>'Anual', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insert(['nombre' =>'Sólo si se presenta un incidente', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insert(['nombre' =>'No requiere mantenimiento', 'tipo' => 'mantenimientos_requeridos']);


        DB::table('selecsForm')->insert(['nombre' =>'Si, ¿Cual?', 'tipo' => 'capacidad_instalada']);
        DB::table('selecsForm')->insert(['nombre' =>'No', 'tipo' => 'capacidad_instalada']);


        DB::table('selecsForm')->insert(['nombre' =>'1', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insert(['nombre' =>'2', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insert(['nombre' =>'3', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insert(['nombre' =>'4', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insert(['nombre' =>'5', 'tipo' => 'riesgo_de_la_inversion']);

    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=NombreSeeder
php artisan db:seed --class=selectsSeeder
*/
