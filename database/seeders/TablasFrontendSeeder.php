<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablasFrontendSeeder extends Seeder
{
    /**
     * php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
     * php artisan db=>seed --class=administrativosUserSeeder
    */
    public function run(){
        //planmejoramientonecesidad
        //lineadelplan
        //proceso_que_solicita_presupuesto
        //actividades no pofavo
        //categorias
        //vigencias_anteriores
        DB::table('planmejoramientonecesidad')->insert(['value' => 1, 'nombre' => 'Pm institucional']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 2, 'nombre' => 'Pm programas']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 3, 'nombre' => 'Pm auditorias']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 0, 'nombre' => 'Ninguno']);

        DB::table('lineadelplan')->insert(['value' => 1, 'nombre' => '1. Academia pertinente e incluyente']);
        DB::table('lineadelplan')->insert(['value' => 2, 'nombre' => '2. Relacionamiento y aportes al entorno social y productivo']);
        DB::table('lineadelplan')->insert(['value' => 3, 'nombre' => '3. Transformación para la educación']);
        DB::table('lineadelplan')->insert(['value' => 4, 'nombre' => '4. Gestión humana y sostenible']);


        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Admisiones, registro y control", 'value' => 1]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Aseguramiento de la calidad académica", 'value' => 2]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Biblioteca", 'value' => 3]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Bienes y servicios", 'value' => 4]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Bienestar institucional", 'value' => 5]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Centro de lenguas", 'value' => 6]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Comunicaciones", 'value' => 7]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Contabilidad", 'value' => 8]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Control interno", 'value' => 9]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Direccion de extension y proyeccion social", 'value' => 10]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Ejecucion de contratos y convenios", 'value' => 11]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Facultad arquitectura e ingenieria", 'value' => 12]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Facultad ciencias de la salud", 'value' => 13]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Facultad ciencias sociales", 'value' => 14]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Facultad de administracion", 'value' => 15]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Gestion ambiental", 'value' => 16]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Gestion documental", 'value' => 17]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Gestion legal", 'value' => 18]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Graduados", 'value' => 19]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Infraestructura", 'value' => 20]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Internacionalizacion", 'value' => 21]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Investigacion", 'value' => 22]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Lacma", 'value' => 23]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Laboratorios facultad ciencias de la salud", 'value' => 24]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Labotatorios facultad de administración", 'value' => 25]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Permanencia", 'value' => 26]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Planeacion", 'value' => 27]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Presupuesto participativo", 'value' => 28]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Rectoria", 'value' => 29]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Secretaria general", 'value' => 30]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Seguridad y salud en el trabajo", 'value' => 31]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Talento humano", 'value' => 32]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Tecnologia de informacion y comunicacion", 'value' => 33]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Vicerrectoria academica", 'value' => 34]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Vicerrectoria administrativa y financiera", 'value' => 35]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Vicerrectoria de investigacion y extension", 'value' => 36]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['nombre' => "Virtualidad", 'value' => 37]);


        //*

        if(false){
            DB::table('actividades')->insert(['value' => 1, 'nombre' => 'Realizar apoyo técnico o profesional']);
            DB::table('actividades')->insert(['value' => 2, 'nombre' => 'Realizar apoyo para administración software investiga y gestión de la información']);
            DB::table('actividades')->insert(['value' => 3, 'nombre' => 'Realizar apoyo a la gestión estrategíca de grupos de invetigación y el mejoramiento en la categorización de investigadores ante min ciencias, dirigir el proceso editorial de la revista sinergia y apoyar los trámites de certificación de productos de investigació']);
            DB::table('actividades')->insert(['value' => 4, 'nombre' => 'Realizar apoyo en temas de protección de la propiedad intelectual y la transferencia tecnológica y de conocimiento de la institución ']);
            DB::table('actividades')->insert(['value' => 5, 'nombre' => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de investigación']);
            DB::table('actividades')->insert(['value' => 6, 'nombre' => 'Prestar servicios de apoyo educativo dentro del proceso de investigación ']);
            DB::table('actividades')->insert(['value' => 7, 'nombre' => 'Realizar apoyo y acompañamiento en la gestión de los programas del centro de emprendimiento, innovación y trasnferencia tecnologica ']);
            DB::table('actividades')->insert(['value' => 8, 'nombre' => 'Realizar apoyo para desarrollar la evaluación de proyectos de investigación, productos, artículos revista y escalafonamiento docente']);
            DB::table('actividades')->insert(['value' => 9, 'nombre' => 'Apoyar la generacion de productos derivados de proyectos de investigacion ']);
            DB::table('actividades')->insert(['value' => 10, 'nombre' => 'Prestar los servicios de preparación y presentación de impuestos y tasas para la protección de propiedad intelectual ']);
            DB::table('actividades')->insert(['value' => 11, 'nombre' => 'Realizar salidas académicas para presentación de resultados de investigación y  actividades de trabajo de campo para recolección de datos, toma de muestras, movilidad aerea']);
            DB::table('actividades')->insert(['value' => 12, 'nombre' => 'Realizar salidas académicas para presentación de resultados de investigación y  actividades de trabajo de campo para recolección de datos, toma de muestras, movilidad terrestre']);
            DB::table('actividades')->insert(['value' => 13, 'nombre' => 'Prestar servicio de hospedaje para las salidas academicas  y  actividades de trabajo de campo para recolección de datos, toma de muestras']);
            DB::table('actividades')->insert(['value' => 14, 'nombre' => 'Realizar la compra de equipos requeridos en proyectos de investigación']);
            DB::table('actividades')->insert(['value' => 15, 'nombre' => 'Realizar compra de insumos para proyectos de investigación']);
            DB::table('actividades')->insert(['value' => 16, 'nombre' => 'Realizar afiliaciones a redes académicas e investigación y pagos de membresía']);
            DB::table('actividades')->insert(['value' => 17, 'nombre' => 'Realizar publicaciones y procesos editoriales.']);
            DB::table('actividades')->insert(['value' => 18, 'nombre' => 'Realizar  soporte tecnico de los sistemas academicos al proceso de  admisiones , registro y control ']);
            DB::table('actividades')->insert(['value' => 19, 'nombre' => 'Realizar  apoyo  y asesoria  a estudiantes en los procesos de de  admisiones , registro y control ']);
            DB::table('actividades')->insert(['value' => 20, 'nombre' => 'Realizar la compra de insumos como diplomas, actas, portadiplomas  para ceremonias de grado de la institución']);
            DB::table('actividades')->insert(['value' => 21, 'nombre' => 'Prestar servicios profesionales para apoyar el logro de las metas de programas e institucional, propuestas en el proceso de aseguramiento de la calidad académica']);
            DB::table('actividades')->insert(['value' => 22, 'nombre' => 'Preservar los libros, revistas, colecciones , bases de datos de la biblioteca institucinal ']);
            DB::table('actividades')->insert(['value' => 23, 'nombre' => 'Actualizar programas y herramientas digitales de la biblioteca ']);
            DB::table('actividades')->insert(['value' => 24, 'nombre' => 'Realizar apoyo técnico y/o profesional al proceso biblioteca ']);
            DB::table('actividades')->insert(['value' => 25, 'nombre' => 'Realizar mantenimiento de equipos (antenas, equipos rfid y tag).']);
            DB::table('actividades')->insert(['value' => 26, 'nombre' => 'Desarrollar proyectos, organización y participación en eventos.']);
            DB::table('actividades')->insert(['value' => 27, 'nombre' => 'Realizar afiliaciones a redes académicas y pagos de membresía']);
            DB::table('actividades')->insert(['value' => 28, 'nombre' => 'Realizar apoyo tecnico, operativo y logistico al proceso de internacionalización']);
            DB::table('actividades')->insert(['value' => 29, 'nombre' => 'Realizar movilidad saliente y entrante para estudiantes  que  particpen en  eventos academicos ']);
            DB::table('actividades')->insert(['value' => 30, 'nombre' => 'Realizar apoyo tecnico y/o profesional en educación artistica y cultural al proceso de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 31, 'nombre' => 'Realizar apoyo tecnico y/o profesional en la línea de deportes ofertada desde el proceso de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 32, 'nombre' => 'Brindar apoyo asistencial a los programas de promoción de la salud y y prevención desarrollados para la comunidad institucional']);
            DB::table('actividades')->insert(['value' => 33, 'nombre' => 'Realizar apoyo tecnico y/o profesional en la parte administratova y logistica del proceso de bienestar']);
            DB::table('actividades')->insert(['value' => 34, 'nombre' => 'Implementar programa de seguridad alimentaria']);
            DB::table('actividades')->insert(['value' => 35, 'nombre' => 'Implementar servicios de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 36, 'nombre' => 'Realizar afiliación anual ascun, fortalecimiento de las líneas de desarrollo humano, deporte y cultura.']);
            DB::table('actividades')->insert(['value' => 37, 'nombre' => 'Realizar mantenimiento a los implementos de las aulas de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 38, 'nombre' => 'Realizar traslados de los grupos de deporte, cultura y otras activiades ']);
            DB::table('actividades')->insert(['value' => 39, 'nombre' => 'Realizar montaje, diseño y proyección de obras de arte']);
            DB::table('actividades')->insert(['value' => 40, 'nombre' => 'Realizar adquisición y mantenimiento de instrumentos musicales ']);
            DB::table('actividades')->insert(['value' => 41, 'nombre' => 'Desarrollar actividades deportivas y recreativas ']);
            DB::table('actividades')->insert(['value' => 42, 'nombre' => 'Realizar envío masivo de correos, sms, ivr y recolección de leads e interesados, usada para comunicación interna y externa con los públicos de interés']);
            DB::table('actividades')->insert(['value' => 43, 'nombre' => 'Realizar apoyo en la planeación y desarrollo de estrategias en marketing e imagen en el proceso de comunicaciones bienestar']);
            DB::table('actividades')->insert(['value' => 44, 'nombre' => 'Implementar el plan de medios masivos y pauta digital, y fortalecimiento de la página web institucional']);
            DB::table('actividades')->insert(['value' => 45, 'nombre' => 'Realizar productos audiovisuales para campañas internas y externas de la institución.']);
            DB::table('actividades')->insert(['value' => 46, 'nombre' => 'Realizar apoyo en diseño gráfico de material publicitario institucional y diseño de campañas.']);
            DB::table('actividades')->insert(['value' => 47, 'nombre' => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la institución']);
            DB::table('actividades')->insert(['value' => 48, 'nombre' => 'Implementar la señalética que se debe actualizar en el campus institucional']);
            DB::table('actividades')->insert(['value' => 49, 'nombre' => 'Adquirir souvenirs para estretagias institucionales y de comunicaciones']);
            DB::table('actividades')->insert(['value' => 50, 'nombre' => 'Realizar compra de equipos para el fortalecimiento del material audiovisual del proceso de comunicación y mercadeo']);
            DB::table('actividades')->insert(['value' => 51, 'nombre' => 'Relizar apoyo profesionales de comunicación y diseño gráfico de los programas y servicios de bienestar a la comunidad institucional. ']);
            DB::table('actividades')->insert(['value' => 52, 'nombre' => 'Implementar la carnetización en la comunidad institucional']);
            DB::table('actividades')->insert(['value' => 53, 'nombre' => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la institución. virtualidad - ']);
            DB::table('actividades')->insert(['value' => 54, 'nombre' => 'Implementar las estrategias del plan de comunicaciones y mercadeo institucional']);
            DB::table('actividades')->insert(['value' => 55, 'nombre' => 'Realizar los  programas de promoción de la salud y y prevención desarrollados para la comunidad institucional por parte del proceso de bienestar institucional ( universidades preventivas)']);
            DB::table('actividades')->insert(['value' => 56, 'nombre' => 'Realizar apoyo al proceso de vicerectoria académica ']);
            DB::table('actividades')->insert(['value' => 57, 'nombre' => 'Realizar apoyo técnico y/o profesional al centro de graduados ']);
            DB::table('actividades')->insert(['value' => 58, 'nombre' => 'Adquirir software para administración y gestión de la bolsa de empleo']);
            DB::table('actividades')->insert(['value' => 59, 'nombre' => 'Adquirir placas para los estudiantes de práctica de la institución']);
            DB::table('actividades')->insert(['value' => 60, 'nombre' => 'Realizar eventos académicos y de relacionamiento con graduados  y sector productivo ']);
            DB::table('actividades')->insert(['value' => 61, 'nombre' => 'Realizar pasantias empresariales  para estudiantes y docentes ']);
            DB::table('actividades')->insert(['value' => 62, 'nombre' => 'Realizar la gestión de la información del observatorio de permanencia y calidad ']);
            DB::table('actividades')->insert(['value' => 63, 'nombre' => 'Realizar apoyo educativo en el proceso  de ingreso, permanencia y graduación ']);
            DB::table('actividades')->insert(['value' => 64, 'nombre' => 'Realizar  apoyo técnico y/o profesional en  producción audiovisual para la grabación, edición y posproduccion de videos y contenido audiovisual que acompañan los cursos ']);
            DB::table('actividades')->insert(['value' => 65, 'nombre' => 'Realizar apoyo técnico y/o profesional en  diseño gráfico, para la realización de piezas graficas y animaciones del  proceso de virtualidad']);
            DB::table('actividades')->insert(['value' => 66, 'nombre' => 'Realizar apoyo técnico y/o profesional al proceso de  virtualidad de cara al ensamble y diseño instruccional ']);
            DB::table('actividades')->insert(['value' => 67, 'nombre' => 'Realizar apoyo profesional  con experiencia en instalación y migración de sistemas o plataformas tipo moodle']);
            DB::table('actividades')->insert(['value' => 68, 'nombre' => 'Realizar apoyo logistico y administrativo en el centro de lenguas']);
            DB::table('actividades')->insert(['value' => 69, 'nombre' => 'Participar de membresias organizaciones nacionales e internacionales .  fac. administración.']);
            DB::table('actividades')->insert(['value' => 70, 'nombre' => 'Realizar acompañamiento al desarrollo de las estrategias académicas desarrolladas   de la fac. administación']);
            DB::table('actividades')->insert(['value' => 71, 'nombre' => 'Realizar apoyo logistico y administrativo en la facultad de administración.']);
            DB::table('actividades')->insert(['value' => 72, 'nombre' => 'Realizar la compra de materia prima como alimentos, granos, cereales, proteinas animales y vegetales y elementos de aseo para gastronomia.  fac. administración ']);
            DB::table('actividades')->insert(['value' => 73, 'nombre' => 'Realizar mantenimiento  (preventivo , correctivo)  de las aulas moviles, economato  y laboratorios de los programas de gastronomia  fac. administración. ']);
            DB::table('actividades')->insert(['value' => 74, 'nombre' => 'Realizar salidas académicas regionales y nacionales. facultad de administración.']);
            DB::table('actividades')->insert(['value' => 75, 'nombre' => 'Prestar el servicio de acompañamiento a los procesos administrativos y logisticos de la facultad de arquitectura e ingenieria. ']);
            DB::table('actividades')->insert(['value' => 76, 'nombre' => 'Participar de redes y   membresias   fac. arquitectura e ingenieria.']);
            DB::table('actividades')->insert(['value' => 77, 'nombre' => 'Realizar mantenimiento a los  laboratorios (preventivo , correctivo) , facultad de arquitectura e ingenieria']);
            DB::table('actividades')->insert(['value' => 78, 'nombre' => 'Realizar salidas académicas  asociadas a los curriculos de los programas y visitas de  practicas   de la facultad de arquitectura e ingenieria']);
            DB::table('actividades')->insert(['value' => 79, 'nombre' => 'Participar en membresias  u organizaciones académicas . fac salud']);
            DB::table('actividades')->insert(['value' => 80, 'nombre' => 'Prestar los servicios como ingeniero biomédico para la facultad de ciencias de la salud. ']);
            DB::table('actividades')->insert(['value' => 81, 'nombre' => 'Prestar los servicios como químico para la facultad de ciencias de la salud. ']);
            DB::table('actividades')->insert(['value' => 82, 'nombre' => 'Realizar diagnóstico y asesoría en biotecnología, como parte de las actividades de extensión de la facultad de  ciencias de la salud (biotecnología). ']);
            DB::table('actividades')->insert(['value' => 83, 'nombre' => 'Realizar apoyo operativo y administrativo en los laboratorios  en la  facultad de ciencias de la salud']);
            DB::table('actividades')->insert(['value' => 84, 'nombre' => 'Realizar calibración de equipos. ']);
            DB::table('actividades')->insert(['value' => 85, 'nombre' => 'Realizar la compra de insumos, químicos, reactivos y kits de  diagnóstico']);
            DB::table('actividades')->insert(['value' => 86, 'nombre' => 'Realizar mantenimiento y reparación de equipos ']);
            DB::table('actividades')->insert(['value' => 87, 'nombre' => 'Realizar salidas académicas regionales y nacionales. facultad de salud']);
            DB::table('actividades')->insert(['value' => 88, 'nombre' => 'Prestar servicio de hospedaje para las salidas academicas  y  actividades de trabajo de campo para recolección de datos, toma de muestras. fac sociales']);
            DB::table('actividades')->insert(['value' => 89, 'nombre' => 'Realizar apoyo técnico y/o profesional a la facultad de ciencias sociales y de educación']);
            DB::table('actividades')->insert(['value' => 90, 'nombre' => 'Realizar afiliaciones a redes académicas. facultad de ciencias sociales y de educación ']);
            DB::table('actividades')->insert(['value' => 91, 'nombre' => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los  procesos academicos  de la facultad de ciencias sociales y de educación']);
            DB::table('actividades')->insert(['value' => 92, 'nombre' => 'Realizar movilidad académicas hacia diferentes experiencias representativas para los programas. facultad de ciencias sociales y de educación']);
            DB::table('actividades')->insert(['value' => 93, 'nombre' => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los procesos académicos de la institución. vicerrectoría académica']);
            DB::table('actividades')->insert(['value' => 94, 'nombre' => 'Realizar mantenimiento y reparación de equipos']);
            DB::table('actividades')->insert(['value' => 95, 'nombre' => 'Realizar calibración de equipos. lacma']);
            DB::table('actividades')->insert(['value' => 96, 'nombre' => 'Prestar servicios de lacma en el valle de aburra y municipios cercanos al departamento de antioquia.']);
            DB::table('actividades')->insert(['value' => 97, 'nombre' => 'Participar en ensayos interlaboratorios de calidad externos']);
            DB::table('actividades')->insert(['value' => 98, 'nombre' => 'Prestar servicios profesionales en el laboratorio lacma']);
            DB::table('actividades')->insert(['value' => 99, 'nombre' => 'Realizar el apoyo administrativo, técnico y logístico  en el proceso de tecnologia y medios audiovisuales']);
            DB::table('actividades')->insert(['value' => 100, 'nombre' => 'Realizar la dotación de infraestructrua tecnologica requerida']);
            DB::table('actividades')->insert(['value' => 101, 'nombre' => 'Realizar mantenimiento de infraestructrua tecnologica requerida']);
            DB::table('actividades')->insert(['value' => 102, 'nombre' => 'Dotar y actualizar aplicativos de software de uso institucional']);
            DB::table('actividades')->insert(['value' => 103, 'nombre' => 'Realizar la formulación del plan maestro integral de infraestructura física institucional']);
            DB::table('actividades')->insert(['value' => 104, 'nombre' => 'Mejorar infraestructura física de la institución universitaria colegio mayor de antioquia']);
            DB::table('actividades')->insert(['value' => 105, 'nombre' => 'Realizar mejoramiento  y adecuación de de las áreas de estudio de los bloques institucionales']);
            DB::table('actividades')->insert(['value' => 106, 'nombre' => 'Realizar mejoramiento y recuperación de las zonas verdes de la institución']);
            DB::table('actividades')->insert(['value' => 107, 'nombre' => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de infraestructura fisica ']);
            DB::table('actividades')->insert(['value' => 108, 'nombre' => 'Realizar el apoyo profesional al proceso de infraestructura fisica ']);
            DB::table('actividades')->insert(['value' => 109, 'nombre' => 'Realizar la automatización de puertas principales.']);
            DB::table('actividades')->insert(['value' => 110, 'nombre' => 'Reserva realizar la formulación del plan maestro integral de infraestructura física intitucional']);
            DB::table('actividades')->insert(['value' => 111, 'nombre' => 'Realizar adecuaciones electricas para el fortalecimiento de la infraestructura']);
            DB::table('actividades')->insert(['value' => 112, 'nombre' => 'Realizar montajes, instalaciones y las adecuaciones  requeridas dentro de la infraestructura física de la institución']);

        }
//selects
        DB::table('categorias')->insert(['nombre' => "Area protegida", 'value' => 1]);
        DB::table('categorias')->insert(['nombre' => "Arl", 'value' => 2]);
        DB::table('categorias')->insert(['nombre' => "Bases de datos", 'value' => 3]);
        DB::table('categorias')->insert(['nombre' => "Calibraciones", 'value' => 4]);
        DB::table('categorias')->insert(['nombre' => "Caja menor", 'value' => 5]);
        DB::table('categorias')->insert(['nombre' => "Contratista", 'value' => 6]);
        DB::table('categorias')->insert(['nombre' => "Cuota de fiscalizacion", 'value' => 7]);
        DB::table('categorias')->insert(['nombre' => "Edictos", 'value' => 8]);
        DB::table('categorias')->insert(['nombre' => "Equipos e intrumentos", 'value' => 9]);
        DB::table('categorias')->insert(['nombre' => "Estimulos docentes", 'value' => 10]);
        DB::table('categorias')->insert(['nombre' => "Eventos", 'value' => 11]);
        DB::table('categorias')->insert(['nombre' => "Exemenes medicos", 'value' => 12]);
        DB::table('categorias')->insert(['nombre' => "Gastos de viaje alimentacion", 'value' => 13]);
        DB::table('categorias')->insert(['nombre' => "Gastos de viaje hospedaje", 'value' => 14]);
        DB::table('categorias')->insert(['nombre' => "Gastos de viaje trasnporte", 'value' => 15]);
        DB::table('categorias')->insert(['nombre' => "Gastos legales", 'value' => 16]);
        DB::table('categorias')->insert(['nombre' => "Gmf", 'value' => 17]);
        DB::table('categorias')->insert(['nombre' => "Inscripciones,afiliaciones y renovaciones", 'value' => 18]);
        DB::table('categorias')->insert(['nombre' => "Insumos", 'value' => 19]);
        DB::table('categorias')->insert(['nombre' => "Instalaciones y reparaciones", 'value' => 20]);
        DB::table('categorias')->insert(['nombre' => "Licencias y membresias", 'value' => 21]);
        DB::table('categorias')->insert(['nombre' => "Mantenimiento", 'value' => 22]);
        DB::table('categorias')->insert(['nombre' => "Mobiliario", 'value' => 23]);
        DB::table('categorias')->insert(['nombre' => "Movilidad academica", 'value' => 24]);
        DB::table('categorias')->insert(['nombre' => "Patentes", 'value' => 25]);
        DB::table('categorias')->insert(['nombre' => "Plan de capacitacion", 'value' => 26]);
        DB::table('categorias')->insert(['nombre' => "Plan de comunicación y mercado y plan de medios", 'value' => 27]);
        DB::table('categorias')->insert(['nombre' => "Plataforma de envío masivo de correos, sms, ivr y recolección de leads e interesados", 'value' => 28]);
        DB::table('categorias')->insert(['nombre' => "Practicante", 'value' => 29]);
        DB::table('categorias')->insert(['nombre' => "Publicaciones y procesos editoriales", 'value' => 30]);
        DB::table('categorias')->insert(['nombre' => "Regionalizacion alimentacion", 'value' => 31]);
        DB::table('categorias')->insert(['nombre' => "Regionalizacion hospedaje", 'value' => 32]);
        DB::table('categorias')->insert(['nombre' => "Regionalizacion transporte", 'value' => 33]);
        DB::table('categorias')->insert(['nombre' => "Seguros y polizas", 'value' => 34]);
        DB::table('categorias')->insert(['nombre' => "Seguridad alimentaria", 'value' => 35]);
        DB::table('categorias')->insert(['nombre' => "Servicio de impresoras y de fotocopias", 'value' => 36]);
        DB::table('categorias')->insert(['nombre' => "Servicio de mensajeria", 'value' => 37]);
        DB::table('categorias')->insert(['nombre' => "Servicios de auditoria y acreditacion", 'value' => 38]);
        DB::table('categorias')->insert(['nombre' => "Servicios publicos", 'value' => 39]);
        DB::table('categorias')->insert(['nombre' => "Software", 'value' => 40]);
        DB::table('categorias')->insert(['nombre' => "Soporte", 'value' => 41]);
        DB::table('categorias')->insert(['nombre' => "Souvenirs", 'value' => 42]);
        DB::table('categorias')->insert(['nombre' => "Subvencion", 'value' => 43]);
        DB::table('categorias')->insert(['nombre' => "Suministro de comidad y refrigerios", 'value' => 44]);
        DB::table('categorias')->insert(['nombre' => "Telefoniacelular e internet", 'value' => 45]);
        DB::table('categorias')->insert(['nombre' => "Viaticos", 'value' => 46]);


        DB::table('vigencias_anteriores')->insert(['nombre' => "Si", 'value' => "si"]);
        DB::table('vigencias_anteriores')->insert(['value' => "No", 'nombre' => "No",]);
    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=TablasFrontendSeeder

php artisan make:model planmejoramientonecesidad 
php artisan make:model lineadelplan 
php artisan make:model proceso_que_solicita_presupuesto 
php artisan make:model actividades 
php artisan make:model categorias 
php artisan make:model vigencias_anteriores 
*/