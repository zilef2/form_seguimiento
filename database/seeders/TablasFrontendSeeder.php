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
        DB::table('planmejoramientonecesidad')->insert(['value' => 1, 'label' => 'Pm institucional']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 2, 'label' => 'Pm programas']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 3, 'label' => 'Pm auditorias']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 0, 'label' => 'Ninguno']);

        DB::table('lineadelplan')->insert(['value' => 1, 'label' => '1. Academia pertinente e incluyente']);
        DB::table('lineadelplan')->insert(['value' => 2, 'label' => '2. Relacionamiento y aportes al entorno social y productivo']);
        DB::table('lineadelplan')->insert(['value' => 3, 'label' => '3. Transformación para la educación']);
        DB::table('lineadelplan')->insert(['value' => 4, 'label' => '4. Gestión humana y sostenible']);


        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Admisiones, registro y control", 'value' => 1]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Aseguramiento de la calidad académica", 'value' => 2]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Biblioteca", 'value' => 3]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Bienes y servicios", 'value' => 4]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Bienestar institucional", 'value' => 5]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Centro de lenguas", 'value' => 6]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Comunicaciones", 'value' => 7]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Contabilidad", 'value' => 8]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Control interno", 'value' => 9]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Direccion de extension y proyeccion social", 'value' => 10]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Ejecucion de contratos y convenios", 'value' => 11]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Facultad arquitectura e ingenieria", 'value' => 12]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Facultad ciencias de la salud", 'value' => 13]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Facultad ciencias sociales", 'value' => 14]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Facultad de administracion", 'value' => 15]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Gestion ambiental", 'value' => 16]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Gestion documental", 'value' => 17]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Gestion legal", 'value' => 18]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Graduados", 'value' => 19]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Infraestructura", 'value' => 20]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Internacionalizacion", 'value' => 21]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Investigacion", 'value' => 22]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Lacma", 'value' => 23]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Laboratorios facultad ciencias de la salud", 'value' => 24]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Labotatorios facultad de administración", 'value' => 25]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Permanencia", 'value' => 26]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Planeacion", 'value' => 27]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Presupuesto participativo", 'value' => 28]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Rectoria", 'value' => 29]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Secretaria general", 'value' => 30]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Seguridad y salud en el trabajo", 'value' => 31]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Talento humano", 'value' => 32]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Tecnologia de informacion y comunicacion", 'value' => 33]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Vicerrectoria academica", 'value' => 34]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Vicerrectoria administrativa y financiera", 'value' => 35]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Vicerrectoria de investigacion y extension", 'value' => 36]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "Virtualidad", 'value' => 37]);


        //*

        if(false){ //la actividad es un campo para escribir
            DB::table('actividades')->insert(['value' => 1, 'label' => 'Realizar apoyo técnico o profesional']);
            DB::table('actividades')->insert(['value' => 2, 'label' => 'Realizar apoyo para administración software investiga y gestión de la información']);
            DB::table('actividades')->insert(['value' => 3, 'label' => 'Realizar apoyo a la gestión estrategíca de grupos de invetigación y el mejoramiento en la categorización de investigadores ante min ciencias, dirigir el proceso editorial de la revista sinergia y apoyar los trámites de certificación de productos de investigació']);
            DB::table('actividades')->insert(['value' => 4, 'label' => 'Realizar apoyo en temas de protección de la propiedad intelectual y la transferencia tecnológica y de conocimiento de la institución ']);
            DB::table('actividades')->insert(['value' => 5, 'label' => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de investigación']);
            DB::table('actividades')->insert(['value' => 6, 'label' => 'Prestar servicios de apoyo educativo dentro del proceso de investigación ']);
            DB::table('actividades')->insert(['value' => 7, 'label' => 'Realizar apoyo y acompañamiento en la gestión de los programas del centro de emprendimiento, innovación y trasnferencia tecnologica ']);
            DB::table('actividades')->insert(['value' => 8, 'label' => 'Realizar apoyo para desarrollar la evaluación de proyectos de investigación, productos, artículos revista y escalafonamiento docente']);
            DB::table('actividades')->insert(['value' => 9, 'label' => 'Apoyar la generacion de productos derivados de proyectos de investigacion ']);
            DB::table('actividades')->insert(['value' => 10, 'label' => 'Prestar los servicios de preparación y presentación de impuestos y tasas para la protección de propiedad intelectual ']);
            DB::table('actividades')->insert(['value' => 11, 'label' => 'Realizar salidas académicas para presentación de resultados de investigación y  actividades de trabajo de campo para recolección de datos, toma de muestras, movilidad aerea']);
            DB::table('actividades')->insert(['value' => 12, 'label' => 'Realizar salidas académicas para presentación de resultados de investigación y  actividades de trabajo de campo para recolección de datos, toma de muestras, movilidad terrestre']);
            DB::table('actividades')->insert(['value' => 13, 'label' => 'Prestar servicio de hospedaje para las salidas academicas  y  actividades de trabajo de campo para recolección de datos, toma de muestras']);
            DB::table('actividades')->insert(['value' => 14, 'label' => 'Realizar la compra de equipos requeridos en proyectos de investigación']);
            DB::table('actividades')->insert(['value' => 15, 'label' => 'Realizar compra de insumos para proyectos de investigación']);
            DB::table('actividades')->insert(['value' => 16, 'label' => 'Realizar afiliaciones a redes académicas e investigación y pagos de membresía']);
            DB::table('actividades')->insert(['value' => 17, 'label' => 'Realizar publicaciones y procesos editoriales.']);
            DB::table('actividades')->insert(['value' => 18, 'label' => 'Realizar  soporte tecnico de los sistemas academicos al proceso de  admisiones , registro y control ']);
            DB::table('actividades')->insert(['value' => 19, 'label' => 'Realizar  apoyo  y asesoria  a estudiantes en los procesos de de  admisiones , registro y control ']);
            DB::table('actividades')->insert(['value' => 20, 'label' => 'Realizar la compra de insumos como diplomas, actas, portadiplomas  para ceremonias de grado de la institución']);
            DB::table('actividades')->insert(['value' => 21, 'label' => 'Prestar servicios profesionales para apoyar el logro de las metas de programas e institucional, propuestas en el proceso de aseguramiento de la calidad académica']);
            DB::table('actividades')->insert(['value' => 22, 'label' => 'Preservar los libros, revistas, colecciones , bases de datos de la biblioteca institucinal ']);
            DB::table('actividades')->insert(['value' => 23, 'label' => 'Actualizar programas y herramientas digitales de la biblioteca ']);
            DB::table('actividades')->insert(['value' => 24, 'label' => 'Realizar apoyo técnico y/o profesional al proceso biblioteca ']);
            DB::table('actividades')->insert(['value' => 25, 'label' => 'Realizar mantenimiento de equipos (antenas, equipos rfid y tag).']);
            DB::table('actividades')->insert(['value' => 26, 'label' => 'Desarrollar proyectos, organización y participación en eventos.']);
            DB::table('actividades')->insert(['value' => 27, 'label' => 'Realizar afiliaciones a redes académicas y pagos de membresía']);
            DB::table('actividades')->insert(['value' => 28, 'label' => 'Realizar apoyo tecnico, operativo y logistico al proceso de internacionalización']);
            DB::table('actividades')->insert(['value' => 29, 'label' => 'Realizar movilidad saliente y entrante para estudiantes  que  particpen en  eventos academicos ']);
            DB::table('actividades')->insert(['value' => 30, 'label' => 'Realizar apoyo tecnico y/o profesional en educación artistica y cultural al proceso de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 31, 'label' => 'Realizar apoyo tecnico y/o profesional en la línea de deportes ofertada desde el proceso de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 32, 'label' => 'Brindar apoyo asistencial a los programas de promoción de la salud y y prevención desarrollados para la comunidad institucional']);
            DB::table('actividades')->insert(['value' => 33, 'label' => 'Realizar apoyo tecnico y/o profesional en la parte administratova y logistica del proceso de bienestar']);
            DB::table('actividades')->insert(['value' => 34, 'label' => 'Implementar programa de seguridad alimentaria']);
            DB::table('actividades')->insert(['value' => 35, 'label' => 'Implementar servicios de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 36, 'label' => 'Realizar afiliación anual ascun, fortalecimiento de las líneas de desarrollo humano, deporte y cultura.']);
            DB::table('actividades')->insert(['value' => 37, 'label' => 'Realizar mantenimiento a los implementos de las aulas de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 38, 'label' => 'Realizar traslados de los grupos de deporte, cultura y otras activiades ']);
            DB::table('actividades')->insert(['value' => 39, 'label' => 'Realizar montaje, diseño y proyección de obras de arte']);
            DB::table('actividades')->insert(['value' => 40, 'label' => 'Realizar adquisición y mantenimiento de instrumentos musicales ']);
            DB::table('actividades')->insert(['value' => 41, 'label' => 'Desarrollar actividades deportivas y recreativas ']);
            DB::table('actividades')->insert(['value' => 42, 'label' => 'Realizar envío masivo de correos, sms, ivr y recolección de leads e interesados, usada para comunicación interna y externa con los públicos de interés']);
            DB::table('actividades')->insert(['value' => 43, 'label' => 'Realizar apoyo en la planeación y desarrollo de estrategias en marketing e imagen en el proceso de comunicaciones bienestar']);
            DB::table('actividades')->insert(['value' => 44, 'label' => 'Implementar el plan de medios masivos y pauta digital, y fortalecimiento de la página web institucional']);
            DB::table('actividades')->insert(['value' => 45, 'label' => 'Realizar productos audiovisuales para campañas internas y externas de la institución.']);
            DB::table('actividades')->insert(['value' => 46, 'label' => 'Realizar apoyo en diseño gráfico de material publicitario institucional y diseño de campañas.']);
            DB::table('actividades')->insert(['value' => 47, 'label' => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la institución']);
            DB::table('actividades')->insert(['value' => 48, 'label' => 'Implementar la señalética que se debe actualizar en el campus institucional']);
            DB::table('actividades')->insert(['value' => 49, 'label' => 'Adquirir souvenirs para estretagias institucionales y de comunicaciones']);
            DB::table('actividades')->insert(['value' => 50, 'label' => 'Realizar compra de equipos para el fortalecimiento del material audiovisual del proceso de comunicación y mercadeo']);
            DB::table('actividades')->insert(['value' => 51, 'label' => 'Relizar apoyo profesionales de comunicación y diseño gráfico de los programas y servicios de bienestar a la comunidad institucional. ']);
            DB::table('actividades')->insert(['value' => 52, 'label' => 'Implementar la carnetización en la comunidad institucional']);
            DB::table('actividades')->insert(['value' => 53, 'label' => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la institución. virtualidad - ']);
            DB::table('actividades')->insert(['value' => 54, 'label' => 'Implementar las estrategias del plan de comunicaciones y mercadeo institucional']);
            DB::table('actividades')->insert(['value' => 55, 'label' => 'Realizar los  programas de promoción de la salud y y prevención desarrollados para la comunidad institucional por parte del proceso de bienestar institucional ( universidades preventivas)']);
            DB::table('actividades')->insert(['value' => 56, 'label' => 'Realizar apoyo al proceso de vicerectoria académica ']);
            DB::table('actividades')->insert(['value' => 57, 'label' => 'Realizar apoyo técnico y/o profesional al centro de graduados ']);
            DB::table('actividades')->insert(['value' => 58, 'label' => 'Adquirir software para administración y gestión de la bolsa de empleo']);
            DB::table('actividades')->insert(['value' => 59, 'label' => 'Adquirir placas para los estudiantes de práctica de la institución']);
            DB::table('actividades')->insert(['value' => 60, 'label' => 'Realizar eventos académicos y de relacionamiento con graduados  y sector productivo ']);
            DB::table('actividades')->insert(['value' => 61, 'label' => 'Realizar pasantias empresariales  para estudiantes y docentes ']);
            DB::table('actividades')->insert(['value' => 62, 'label' => 'Realizar la gestión de la información del observatorio de permanencia y calidad ']);
            DB::table('actividades')->insert(['value' => 63, 'label' => 'Realizar apoyo educativo en el proceso  de ingreso, permanencia y graduación ']);
            DB::table('actividades')->insert(['value' => 64, 'label' => 'Realizar  apoyo técnico y/o profesional en  producción audiovisual para la grabación, edición y posproduccion de videos y contenido audiovisual que acompañan los cursos ']);
            DB::table('actividades')->insert(['value' => 65, 'label' => 'Realizar apoyo técnico y/o profesional en  diseño gráfico, para la realización de piezas graficas y animaciones del  proceso de virtualidad']);
            DB::table('actividades')->insert(['value' => 66, 'label' => 'Realizar apoyo técnico y/o profesional al proceso de  virtualidad de cara al ensamble y diseño instruccional ']);
            DB::table('actividades')->insert(['value' => 67, 'label' => 'Realizar apoyo profesional  con experiencia en instalación y migración de sistemas o plataformas tipo moodle']);
            DB::table('actividades')->insert(['value' => 68, 'label' => 'Realizar apoyo logistico y administrativo en el centro de lenguas']);
            DB::table('actividades')->insert(['value' => 69, 'label' => 'Participar de membresias organizaciones nacionales e internacionales .  fac. administración.']);
            DB::table('actividades')->insert(['value' => 70, 'label' => 'Realizar acompañamiento al desarrollo de las estrategias académicas desarrolladas   de la fac. administación']);
            DB::table('actividades')->insert(['value' => 71, 'label' => 'Realizar apoyo logistico y administrativo en la facultad de administración.']);
            DB::table('actividades')->insert(['value' => 72, 'label' => 'Realizar la compra de materia prima como alimentos, granos, cereales, proteinas animales y vegetales y elementos de aseo para gastronomia.  fac. administración ']);
            DB::table('actividades')->insert(['value' => 73, 'label' => 'Realizar mantenimiento  (preventivo , correctivo)  de las aulas moviles, economato  y laboratorios de los programas de gastronomia  fac. administración. ']);
            DB::table('actividades')->insert(['value' => 74, 'label' => 'Realizar salidas académicas regionales y nacionales. facultad de administración.']);
            DB::table('actividades')->insert(['value' => 75, 'label' => 'Prestar el servicio de acompañamiento a los procesos administrativos y logisticos de la facultad de arquitectura e ingenieria. ']);
            DB::table('actividades')->insert(['value' => 76, 'label' => 'Participar de redes y   membresias   fac. arquitectura e ingenieria.']);
            DB::table('actividades')->insert(['value' => 77, 'label' => 'Realizar mantenimiento a los  laboratorios (preventivo , correctivo) , facultad de arquitectura e ingenieria']);
            DB::table('actividades')->insert(['value' => 78, 'label' => 'Realizar salidas académicas  asociadas a los curriculos de los programas y visitas de  practicas   de la facultad de arquitectura e ingenieria']);
            DB::table('actividades')->insert(['value' => 79, 'label' => 'Participar en membresias  u organizaciones académicas . fac salud']);
            DB::table('actividades')->insert(['value' => 80, 'label' => 'Prestar los servicios como ingeniero biomédico para la facultad de ciencias de la salud. ']);
            DB::table('actividades')->insert(['value' => 81, 'label' => 'Prestar los servicios como químico para la facultad de ciencias de la salud. ']);
            DB::table('actividades')->insert(['value' => 82, 'label' => 'Realizar diagnóstico y asesoría en biotecnología, como parte de las actividades de extensión de la facultad de  ciencias de la salud (biotecnología). ']);
            DB::table('actividades')->insert(['value' => 83, 'label' => 'Realizar apoyo operativo y administrativo en los laboratorios  en la  facultad de ciencias de la salud']);
            DB::table('actividades')->insert(['value' => 84, 'label' => 'Realizar calibración de equipos. ']);
            DB::table('actividades')->insert(['value' => 85, 'label' => 'Realizar la compra de insumos, químicos, reactivos y kits de  diagnóstico']);
            DB::table('actividades')->insert(['value' => 86, 'label' => 'Realizar mantenimiento y reparación de equipos ']);
            DB::table('actividades')->insert(['value' => 87, 'label' => 'Realizar salidas académicas regionales y nacionales. facultad de salud']);
            DB::table('actividades')->insert(['value' => 88, 'label' => 'Prestar servicio de hospedaje para las salidas academicas  y  actividades de trabajo de campo para recolección de datos, toma de muestras. fac sociales']);
            DB::table('actividades')->insert(['value' => 89, 'label' => 'Realizar apoyo técnico y/o profesional a la facultad de ciencias sociales y de educación']);
            DB::table('actividades')->insert(['value' => 90, 'label' => 'Realizar afiliaciones a redes académicas. facultad de ciencias sociales y de educación ']);
            DB::table('actividades')->insert(['value' => 91, 'label' => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los  procesos academicos  de la facultad de ciencias sociales y de educación']);
            DB::table('actividades')->insert(['value' => 92, 'label' => 'Realizar movilidad académicas hacia diferentes experiencias representativas para los programas. facultad de ciencias sociales y de educación']);
            DB::table('actividades')->insert(['value' => 93, 'label' => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los procesos académicos de la institución. vicerrectoría académica']);
            DB::table('actividades')->insert(['value' => 94, 'label' => 'Realizar mantenimiento y reparación de equipos']);
            DB::table('actividades')->insert(['value' => 95, 'label' => 'Realizar calibración de equipos. lacma']);
            DB::table('actividades')->insert(['value' => 96, 'label' => 'Prestar servicios de lacma en el valle de aburra y municipios cercanos al departamento de antioquia.']);
            DB::table('actividades')->insert(['value' => 97, 'label' => 'Participar en ensayos interlaboratorios de calidad externos']);
            DB::table('actividades')->insert(['value' => 98, 'label' => 'Prestar servicios profesionales en el laboratorio lacma']);
            DB::table('actividades')->insert(['value' => 99, 'label' => 'Realizar el apoyo administrativo, técnico y logístico  en el proceso de tecnologia y medios audiovisuales']);
            DB::table('actividades')->insert(['value' => 100, 'label' => 'Realizar la dotación de infraestructrua tecnologica requerida']);
            DB::table('actividades')->insert(['value' => 101, 'label' => 'Realizar mantenimiento de infraestructrua tecnologica requerida']);
            DB::table('actividades')->insert(['value' => 102, 'label' => 'Dotar y actualizar aplicativos de software de uso institucional']);
            DB::table('actividades')->insert(['value' => 103, 'label' => 'Realizar la formulación del plan maestro integral de infraestructura física institucional']);
            DB::table('actividades')->insert(['value' => 104, 'label' => 'Mejorar infraestructura física de la institución universitaria colegio mayor de antioquia']);
            DB::table('actividades')->insert(['value' => 105, 'label' => 'Realizar mejoramiento  y adecuación de de las áreas de estudio de los bloques institucionales']);
            DB::table('actividades')->insert(['value' => 106, 'label' => 'Realizar mejoramiento y recuperación de las zonas verdes de la institución']);
            DB::table('actividades')->insert(['value' => 107, 'label' => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de infraestructura fisica ']);
            DB::table('actividades')->insert(['value' => 108, 'label' => 'Realizar el apoyo profesional al proceso de infraestructura fisica ']);
            DB::table('actividades')->insert(['value' => 109, 'label' => 'Realizar la automatización de puertas principales.']);
            DB::table('actividades')->insert(['value' => 110, 'label' => 'Reserva realizar la formulación del plan maestro integral de infraestructura física intitucional']);
            DB::table('actividades')->insert(['value' => 111, 'label' => 'Realizar adecuaciones electricas para el fortalecimiento de la infraestructura']);
            DB::table('actividades')->insert(['value' => 112, 'label' => 'Realizar montajes, instalaciones y las adecuaciones  requeridas dentro de la infraestructura física de la institución']);

        }
//selects
        DB::table('categorias')->insert(['label' => "Area protegida", 'value' => 1]);
        DB::table('categorias')->insert(['label' => "Arl", 'value' => 2]);
        DB::table('categorias')->insert(['label' => "Bases de datos", 'value' => 3]);
        DB::table('categorias')->insert(['label' => "Calibraciones", 'value' => 4]);
        DB::table('categorias')->insert(['label' => "Caja menor", 'value' => 5]);
        DB::table('categorias')->insert(['label' => "Contratista", 'value' => 6]);
        DB::table('categorias')->insert(['label' => "Cuota de fiscalizacion", 'value' => 7]);
        DB::table('categorias')->insert(['label' => "Edictos", 'value' => 8]);
        DB::table('categorias')->insert(['label' => "Equipos e intrumentos", 'value' => 9]);
        DB::table('categorias')->insert(['label' => "Estimulos docentes", 'value' => 10]);
        DB::table('categorias')->insert(['label' => "Eventos", 'value' => 11]);
        DB::table('categorias')->insert(['label' => "Exemenes medicos", 'value' => 12]);
        DB::table('categorias')->insert(['label' => "Gastos de viaje alimentacion", 'value' => 13]);
        DB::table('categorias')->insert(['label' => "Gastos de viaje hospedaje", 'value' => 14]);
        DB::table('categorias')->insert(['label' => "Gastos de viaje trasnporte", 'value' => 15]);
        DB::table('categorias')->insert(['label' => "Gastos legales", 'value' => 16]);
        DB::table('categorias')->insert(['label' => "Gmf", 'value' => 17]);
        DB::table('categorias')->insert(['label' => "Inscripciones,afiliaciones y renovaciones", 'value' => 18]);
        DB::table('categorias')->insert(['label' => "Insumos", 'value' => 19]);
        DB::table('categorias')->insert(['label' => "Instalaciones y reparaciones", 'value' => 20]);
        DB::table('categorias')->insert(['label' => "Licencias y membresias", 'value' => 21]);
        DB::table('categorias')->insert(['label' => "Mantenimiento", 'value' => 22]);
        DB::table('categorias')->insert(['label' => "Mobiliario", 'value' => 23]);
        DB::table('categorias')->insert(['label' => "Movilidad academica", 'value' => 24]);
        DB::table('categorias')->insert(['label' => "Patentes", 'value' => 25]);
        DB::table('categorias')->insert(['label' => "Plan de capacitacion", 'value' => 26]);
        DB::table('categorias')->insert(['label' => "Plan de comunicación y mercado y plan de medios", 'value' => 27]);
        DB::table('categorias')->insert(['label' => "Plataforma de envío masivo de correos, sms, ivr y recolección de leads e interesados", 'value' => 28]);
        DB::table('categorias')->insert(['label' => "Practicante", 'value' => 29]);
        DB::table('categorias')->insert(['label' => "Publicaciones y procesos editoriales", 'value' => 30]);
        DB::table('categorias')->insert(['label' => "Regionalizacion alimentacion", 'value' => 31]);
        DB::table('categorias')->insert(['label' => "Regionalizacion hospedaje", 'value' => 32]);
        DB::table('categorias')->insert(['label' => "Regionalizacion transporte", 'value' => 33]);
        DB::table('categorias')->insert(['label' => "Seguros y polizas", 'value' => 34]);
        DB::table('categorias')->insert(['label' => "Seguridad alimentaria", 'value' => 35]);
        DB::table('categorias')->insert(['label' => "Servicio de impresoras y de fotocopias", 'value' => 36]);
        DB::table('categorias')->insert(['label' => "Servicio de mensajeria", 'value' => 37]);
        DB::table('categorias')->insert(['label' => "Servicios de auditoria y acreditacion", 'value' => 38]);
        DB::table('categorias')->insert(['label' => "Servicios publicos", 'value' => 39]);
        DB::table('categorias')->insert(['label' => "Software", 'value' => 40]);
        DB::table('categorias')->insert(['label' => "Soporte", 'value' => 41]);
        DB::table('categorias')->insert(['label' => "Souvenirs", 'value' => 42]);
        DB::table('categorias')->insert(['label' => "Subvencion", 'value' => 43]);
        DB::table('categorias')->insert(['label' => "Suministro de comidad y refrigerios", 'value' => 44]);
        DB::table('categorias')->insert(['label' => "Telefoniacelular e internet", 'value' => 45]);
        DB::table('categorias')->insert(['label' => "Viaticos", 'value' => 46]);


        DB::table('vigencias_anteriores')->insert(['label' => "Si", 'value' => "si"]);
        DB::table('vigencias_anteriores')->insert(['value' => "No", 'label' => "No",]);
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
