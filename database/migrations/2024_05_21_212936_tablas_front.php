<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     php artisan migrate --path=database/migrations/nuevas/

     */
    public function up(): void{
        Schema::create('proceso_que_solicita_presupuesto', function (Blueprint $table) {$table->id();$table->string('value');$table->string('label',255);$table->timestamps();});
        Schema::create('planmejoramientonecesidad', function (Blueprint $table) {$table->id();$table->string('value');$table->string('label',512);$table->timestamps();});
        Schema::create('lineadelplan', function (Blueprint $table) {$table->id();$table->string('value');$table->string('label',255);$table->timestamps();});
        Schema::create('actividades', function (Blueprint $table) {$table->id();$table->string('value');$table->string('label',255);$table->timestamps();});
        Schema::create('categorias', function (Blueprint $table) {$table->id();$table->string('value');$table->string('label',255);$table->timestamps();});
        Schema::create('vigencias_anteriores', function (Blueprint $table) {$table->id();$table->string('value');$table->string('label',255);$table->timestamps();});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('lineadelplan');
        Schema::dropIfExists('planmejoramientonecesidad');
        Schema::dropIfExists('proceso_que_solicita_presupuesto');
        Schema::dropIfExists('vigencias_anteriores');
    }
};
/*
php artisan migrate --path=/database/migrations/2024_05_21_212936_tablas_front.php
php artisan db:seed --class=TablasFrontendSeeder
php artisan migrate:rollback --path=/database/migrations/2024_05_21_212936_tablas_front.php

*/