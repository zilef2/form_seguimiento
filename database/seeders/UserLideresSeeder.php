<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserLideresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $users2 = [
            ['name' => 'LUIS MIGUEL VALLEJO AGUDELO', 'identificacion' => '1128434042', 'area' => 'ADMISIONES', 'agregado' => 'INVERSION','sexo'=>'Masculino'],
            ['name' => 'CLAUDIA EDID ARREDONDO HERNÁNDEZ', 'identificacion' => '43725139', 'area' => 'BIBLIOTECA', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'ISABEL CRISTINA JIMENEZ LONDOÑO', 'identificacion' => '1017195904', 'area' => 'SIACA', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'BEATRIZ ELENA MILLÁN MURILLO', 'identificacion' => '43578829', 'area' => 'BIENES Y SERVICIOS', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Femenino'],
            ['name' => 'LUIS GABRIEL JARAMILLO', 'identificacion' => '71210429', 'area' => 'BIENESTAR INSTITUCIONAL', 'agregado' => 'INVERSION-FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'JOHN FERNANDO RAMÍREZ', 'identificacion' => '71702653', 'area' => 'CENTRO DE LENGUAS', 'agregado' => 'INVERSION','sexo'=>'Masculino'],
            ['name' => 'JUAN DAVID CALLE TOBÓN', 'identificacion' => '71786266', 'area' => 'CONTROL INTERNO', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'RUBÉN DARÍO OSORIO JIMÉNEZ', 'identificacion' => '71623383', 'area' => 'V.ACADEMICA', 'agregado' => 'INVERSION','sexo'=>'Masculino'],
            ['name' => 'ANGELA MARÍA GAVIRIA NÚÑEZ', 'identificacion' => '45476957', 'area' => 'V. INVESTIGACION EXTENSION', 'agregado' => 'INVERSION-FUNCIONAMIENTO','sexo'=>'Femenino'],
            ['name' => 'YOVANA LONDOÑO', 'identificacion' => '1020409103', 'area' => 'V. INVESTIGACION EXTENSION', 'agregado' => 'INVERSION-FUNCIONAMIENTO','sexo'=>'Femenino'],
            ['name' => 'WILMAR MAURICIO SEPÚLVEDA', 'identificacion' => '71276171', 'area' => 'F. ADMINISTRACION', 'agregado' => 'INVERSION','sexo'=>'Masculino'],
            ['name' => 'CARLOS ANDRÉS MEDINA RESTREPO', 'identificacion' => '71777778', 'area' => 'F. ARQUITECTURA', 'agregado' => 'INVERSION','sexo'=>'Masculino'],
            ['name' => 'MONICA MARIA DURANGO ZULETA', 'identificacion' => '43549733', 'area' => 'F. SALUD', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'CARLOS MARIO CORREA CADAVID', 'identificacion' => '98500301', 'area' => 'F. SOCIALES', 'agregado' => 'INVERSION','sexo'=>'Masculino'],
            ['name' => 'JORGE WILLIAM ARREDONDO ARANGO', 'identificacion' => '71719090', 'area' => 'V.ADMINISTRATIVA', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'EDWIN DAVID MORENO QUINTERO', 'identificacion' => '94154496', 'area' => 'AMBIENTAL', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'JUAN GABRIEL FRANCO ARBOLEDA', 'identificacion' => '15459054', 'area' => 'INFRAESTRUCTURA', 'agregado' => 'INVERSION-FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'YESSIKA GÓMEZ PALACIO', 'identificacion' => '1152436991', 'area' => 'COMUNICACIONES', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'ISABEL CRISTINA CARMONA QUINTERO', 'identificacion' => '43163805', 'area' => 'CALIDAD', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Femenino'],
            ['name' => 'FRANCISCO JAVIER RESTREPO NARANJO', 'identificacion' => '7545436', 'area' => 'TECNOLOGIA', 'agregado' => 'INVERSION-FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'HENRY GARCÍA TORO', 'identificacion' => '71699502', 'area' => 'TALENTO HUMANO', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'GABRIEL JAIME CASTAÑEDA GUTIÉRREZ', 'identificacion' => '1036627068', 'area' => 'GESTION DOCUMENTAL', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'JOSE LUIS SANCHEZ CARDONA', 'identificacion' => '1055834738', 'area' => 'GESTION JURIDICA', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'YESSICA JARAMILLO ROLDÁN', 'identificacion' => '1128478778', 'area' => 'GRADUADOS', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'MANUELA PANTOJA BOHORQUEZ', 'identificacion' => '1002592785', 'area' => 'INTERNACIONALIZACION', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'MAYRA ALEJANDRA FUENTES', 'identificacion' => '1042707466', 'area' => 'LACMA', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'IVON JARAMILLO GARCÍA', 'identificacion' => '1047385557', 'area' => 'PERMANENCIA', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'LUIS FELIPE GONZÁLEZ AGUDELO', 'identificacion' => '71379683', 'area' => 'PLANEACION', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'ANDRES FELIPE GARCIA TOBAR', 'identificacion' => '8464791', 'area' => 'PRESUPUESTO PARTICIPATIVO', 'agregado' => 'INVERSION','sexo'=>'Masculino'],
            ['name' => 'JUAN DAVID GÓMEZ FLÓREZ', 'identificacion' => '71730355', 'area' => 'RECTORIA', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'DIANA PATRICIA GÓMEZ RAMÍREZ', 'identificacion' => '1128452704', 'area' => 'SECRETARIA GENERAL', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Femenino'],
            ['name' => 'CARLOS EDUARDO CARVAJAL TANGARIFE', 'identificacion' => '9976965', 'area' => 'SST', 'agregado' => 'FUNCIONAMIENTO','sexo'=>'Masculino'],
            ['name' => 'VIVIANA DIAZ GIRALDO', 'identificacion' => '32141336', 'area' => 'VIRTUALIDAD', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            ['name' => 'LINA PATRICIA JIMENEZ', 'identificacion' => '43590765', 'area' => 'FTDH', 'agregado' => 'INVERSION','sexo'=>'Femenino'],
            
            
            ['name' => 'JUAN DIEGO VILLA CARVAJAL', 'identificacion' => '1039447799', 'area' => 'Proceso de investigación', 'agregado' => 'Profesional Universitario','sexo'=>'Masculino', 'email' => 'juan.villa@colmayor.edu.co'],
            ['name' => 'JULIAN STIVEN ORTIZ RESTREPO', 'identificacion' => '1047996764', 'area' => 'Centro de Lenguas', 'agregado' => 'Profesional','sexo'=>'Masculino', 'email' => 'julian.ortiz@colmayor.edu.co'],
            
            //se agregaron 2 personas el 20 jun2024 -- jackepruebas y  8105904 del Lider Jose Mario Lopez Gomez.
            //26 jun JULIAN STIVEN ORTIZ RESTREPO CC 1047996763
        ];
        foreach ($users2 as $user) {
            $cedula = $user['identificacion'];
            $nuevoUsuario = User::create([
                'name' => $user['name'],
                'email' => $user['email'] ?? $cedula,
                'identificacion' => $cedula,
                'password' => bcrypt($cedula . '..'),
                'area' => $user['area'],
                'agregado' => $user['agregado'],

                'sexo' => $user['sexo'],
                'fecha_nacimiento' => '1990-01-01',
                'celular' => '1',
                'esLider' => 1,
            ]);
            $nuevoUsuario->assignRole('lider');
        }
    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=NombreDeLaSeeder
php artisan db:seed --class=UserLideresSeeder
*/
