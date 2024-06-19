<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/*
php artisan migrate --path=/database/migrations/2024_05_24_200009_todosnull.php
*/
    public function up(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->decimal('valor_total_de_la_solicitud_actual', 20, 2)->nullable()->change();
            $table->decimal('valor_total_asignado_en_vigencia_anterior', 20, 2)->nullable()->change();
            $table->string('proceso_que_solicita_presupuesto')->nullable()->change();//1. sel unica
            $table->text('necesidad')->nullable()->change();//2
            $table->text('justificacion')->nullable()->change();
            $table->string('actividad', 2255)->nullable()->change();// sel unica
            $table->string('categoria')->nullable()->change();// sel unica
            $table->string('unidad_de_medida')->nullable()->change();// sel unica
            $table->decimal('cantidad', 20, 2)->nullable()->change();
            $table->decimal('valor_unitario', 20, 2)->nullable()->change();
            $table->decimal('valor_total_solicitatdo_por_necesidad', 20, 2)->nullable()->change();// 8.5 automatico
            $table->string('periodo_de_inicio_de_ejecucion')->nullable()->change();//sel unica
            $table->string('vigencias_anteriores')->nullable()->change();
            $table->decimal('valor_asignado_en_la_vigencia_anterior', 20, 2)->nullable()->change();
            $table->string('procesos_involucrados')->nullable()->change(); //sel multiple
            $table->string('plan_de_mejoramiento_al_que_apunta_la_necesidad')->nullable()->change(); //sel multiple
            $table->string('linea_del_plan_desarrollo_al_que_apunta_la_necesidad')->nullable()->change(); //sel multiple
            $table->string('frecuencia_de_uso')->nullable()->change();//sel unica
            $table->string('mantenimientos_requeridos')->nullable()->change();//sel unica
            $table->string('capacidad_instalada',1300)->nullable()->change();//sel unica
            $table->string('riesgo_de_la_inversion')->nullable()->change(); //sel unica
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->string('proceso_que_solicita_presupuesto')->nullable();
        });
//        $this->info('La migración todosnull se ha completado.');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
/*
php artisan db:seed --class=NombreDelSeeder
php artisan migrate --path =/database / migrations / nombre_de_archivo_migracion . php
*/