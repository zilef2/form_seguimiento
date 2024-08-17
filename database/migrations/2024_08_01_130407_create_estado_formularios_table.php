<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use App\Models\EstadoFormulario;

class CreateEstadoFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
php artisan migrate --path=/database/migrations/2024_08_01_130407_create_estado_formularios_table.php
     * 
     */
    public function up()
    {
        Schema::create('estado_formularios', function (Blueprint $table) {
            $table->id();
			$table->integer('estado');
			$table->string('nombre');
            $table->timestamps();
        });
        
        EstadoFormulario::Create(['estado' => 1, 'nombre' => 'Sin revisar']);
        EstadoFormulario::Create(['estado' => 2, 'nombre' => 'Aprobado']);
        EstadoFormulario::Create(['estado' => 3, 'nombre' => 'Rechazado']);
        EstadoFormulario::Create(['estado' => 4, 'nombre' => 'Sugerencia']);
        
        Schema::table('formularios', function (Blueprint $table) {
            $table->text('necesidad_sugerida')->nullable();
            $table->decimal('cantidad_sugerida', 20)->nullable();
            $table->decimal('valor_unitario_sugerida', 20)->nullable();
            $table->decimal('valor_total_solicitatdo_por_necesidad_sugerida', 20)->nullable();
        });
        
        //seeders
        
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_formularios');
    }
}
/*
php artisan db:seed --class=NombreDelSeeder
php artisan migrate --path=/database/migrations/nombre_de_archivo_migracion.php

 */