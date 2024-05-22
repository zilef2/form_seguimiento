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
        Schema::create('selecsForm', function (Blueprint $table) {
            $table->id();$table->string('nombre');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('selecsForm');

    }
};
/*
php artisan migrate --path=/database/migrations/2024_05_10_185500_selects_del_formulario.php
php artisan db:seed --class=TablasFrontendSeeder
*/