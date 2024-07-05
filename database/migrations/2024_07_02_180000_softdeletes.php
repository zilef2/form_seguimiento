<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/*
php artisan migrate --path=/database/migrations/2024_07_02_180000_softdeletes.php
*/
    public function up(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->softDeletes();
        });
        
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