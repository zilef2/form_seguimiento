<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion_user');
            $table->string('numero_necesidad');
            $table->decimal('valor_total_de_la_solicitud_actual', 10, 2);
            $table->decimal('valor_total_asignado_en_vigencia_anterior', 10, 2);

            $table->string('proceso_que_solicita_presupuesto');//1. sel unica
            $table->text('necesidad');//2
            $table->text('justificacion');
            $table->string('actividad');// sel unica
            $table->string('categoria');// sel unica
            $table->string('unidad_de_medida');// sel unica
            $table->decimal('cantidad', 10, 2);
            $table->decimal('valor_unitario', 10, 2);
            $table->decimal('valor_total_solicitatdo_por_necesidad', 10, 2);// 8.5 automatico
            $table->string('periodo_de_inicio_de_ejecucion');//sel unica
            $table->string('vigencias_anteriores');//10 //sel unica
            $table->decimal('valor_asignado_en_la_vigencia_anterior', 10, 2);
            $table->string('procesos_involucrados'); //sel multiple
            $table->string('plan_de_mejoramiento_al_que_apunta_la_necesidad'); //sel multiple
            $table->string('linea_del_plan_desarrollo_al_que_apunta_la_necesidad'); //sel multiple
            $table->string('frecuencia_de_uso');//sel unica
            $table->string('mantenimientos_requeridos');//sel unica
            $table->string('capacidad_instalada');//sel unica
            $table->string('riesgo_de_la_inversion'); //sel unica
            $table->string('anexos')->nullable();//19

            $table->integer('enviado');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict'); //cascade | set null
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
/*
php artisan db:seed--class=NombreDelSeeder
php artisan migrate--path =/database / migrations / nombre_de_archivo_migracion . php
*/