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
//        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Meses', 'tipo' => 'unidad_de_medida',]);
//        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Unidades', 'tipo' => 'unidad_de_medida',]);


        //has changed
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Días', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Docenas', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Horas', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Kilogramos', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Litros', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Meses', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Metros', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Metros cuadrados', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Paquetes', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Semanas', 'tipo' => 'unidad_de_medida',]);
        DB::table('selecsForm')->insertOrIgnore(['nombre' => 'Unidades', 'tipo' => 'unidad_de_medida',]);
//        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Otras', 'tipo' => 'unidad_de_medida',]);

        //has changed
        DB::table('selecsForm')->insertOrIgnore([ 'nombre'=>'Entre enero y abril', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        DB::table('selecsForm')->insertOrIgnore([ 'nombre'=>'Entre mayo y agosto', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        DB::table('selecsForm')->insertOrIgnore([ 'nombre'=>'Entre septiembre y diciembre', 'tipo' => 'periodo_de_inicio_de_ejecucion']);
        
//        DB::table('selecsForm')->$this->insertOrIgnore([ 'nombre'=>'Septiembre a octubre', 'tipo' => 'periodo_de_inicio_de_ejecucion']);


        //has changed
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'7 / 24 (permanentemente)', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Días estipulados en el contrato', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Todos los días hábiles del año', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Una única vez', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Una vez a la semana', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Una vez al mes', 'tipo' => 'frecuencia_de_uso']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Una vez por semestre', 'tipo' => 'frecuencia_de_uso']);
        
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Diario', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Semanal', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Mensual', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Semestral', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Anual', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Sólo si se presenta un incidente', 'tipo' => 'mantenimientos_requeridos']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'No requiere mantenimiento', 'tipo' => 'mantenimientos_requeridos']);
        
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'Si, ¿Cual?', 'tipo' => 'capacidad_instalada']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>'No', 'tipo' => 'capacidad_instalada']);
        
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>"Riesgos Fiscal", 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>"Riesgos de Gestión", 'tipo' => 'riesgo_de_la_inversion']);
        DB::table('selecsForm')->insertOrIgnore(['nombre' =>"Riesgos de Corrupción", 'tipo' => 'riesgo_de_la_inversion']);
    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=selectsSeeder
*/
