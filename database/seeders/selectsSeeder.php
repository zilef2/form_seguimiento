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
     * php artisan db:seed --class=selectsSeeder
 * @return void
     */
    public function run(){
        //falta actividad, esta pendiente por definir
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Meses', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Unidades', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Otras', 'tipo' => 'unidad_de_medida',]);


        DB::table('selecsForm')->insertOrIgnore([ 'nombre'=>'Enero a marzo 2025', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        DB::table('selecsForm')->insertOrIgnore([ 'nombre'=>'Abril a junio 2025', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        DB::table('selecsForm')->insertOrIgnore([ 'nombre'=>'Julio a septiembre 2025', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
//        DB::table('selecsForm')->$this->insertOrIgnore([ 'nombre'=>'Septiembre a octubre', 'tipo' => 'periodo_de_inicio_de_ejecucion']);


        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'24/7 (permanentemente)', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Días estipulados en el contrato', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Todos los días hábiles del año', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Una vez al mes', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Varias veces al mes', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Una vez por semestre', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Varias veces al semestre', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Eventos específicos del año', 'tipo' => 'frecuencia_de_uso']);


        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Diario', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Semanal', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Mensual', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Semestral', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Anual', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Sólo si se presenta un incidente', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'No requiere mantenimiento', 'tipo' => 'mantenimientos_requeridos']);


        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Si, ¿Cual?', 'tipo' => 'capacidad_instalada']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'No', 'tipo' => 'capacidad_instalada']);


        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'1', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'2', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'3', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'4', 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'5', 'tipo' => 'riesgo_de_la_inversion']);

    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=selectsSeeder
*/
