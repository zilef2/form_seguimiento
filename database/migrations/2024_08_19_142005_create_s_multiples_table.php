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
        Schema::create('s_multiples', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');  //'procesos_involucrados',
            $table->string('value');

            $table->unsignedBigInteger('formulario_id');
            $table->foreign('formulario_id')
                ->references('id')
                ->on('formularios')
                ->onDelete('cascade'); //cascade | set null
            $table->timestamps();
        });

        Schema::table('formularios',function (Blueprint $table){
            $table->string('Nombre',512)->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_multiples');
    }
};
