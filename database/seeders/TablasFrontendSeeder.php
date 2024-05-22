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
    public function run()
    {
        
        //        planmejoramientonecesidad
        //lineadelplan
        //proceso_que_solicita_presupuesto
        //actividades no pofavo
        //categoria
        //vigencias_anteriores
        DB::table('planmejoramientonecesidad')->insert(['value' => 1, 'label' => 'PM Institucional']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 2, 'label' => 'PM Programas']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 3, 'label' => 'PM Auditorias']);
        DB::table('planmejoramientonecesidad')->insert(['value' => 0, 'label' => 'Ninguno']);

        DB::table('lineadelplan')->insert(['value' => 1, 'label' => '1. Academia Pertinente e Incluyente']);
        DB::table('lineadelplan')->insert(['value' => 2, 'label' => '2. Relacionamiento y Aportes al Entorno Social y Productivo']);
        DB::table('lineadelplan')->insert(['value' => 3, 'label' => '3. Transformación para la Educación']);
        DB::table('lineadelplan')->insert(['value' => 4, 'label' => '4. Gestión Humana y Sostenible']);


        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "ADMISIONES, REGISTRO Y CONTROL", 'value' => 1]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "ASEGURAMIENTO DE LA CALIDAD ACADÉMICA", 'value' => 2]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "BIBLIOTECA", 'value' => 3]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "BIENES Y SERVICIOS", 'value' => 4]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "BIENESTAR INSTITUCIONAL", 'value' => 5]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "CENTRO DE LENGUAS", 'value' => 6]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "COMUNICACIONES", 'value' => 7]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "CONTABILIDAD", 'value' => 8]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "CONTROL INTERNO", 'value' => 9]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "DIRECCION DE EXTENSION Y PROYECCION SOCIAL", 'value' => 10]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "EJECUCION DE CONTRATOS Y CONVENIOS", 'value' => 11]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "FACULTAD ARQUITECTURA E INGENIERIA", 'value' => 12]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "FACULTAD CIENCIAS DE LA SALUD", 'value' => 13]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "FACULTAD CIENCIAS SOCIALES", 'value' => 14]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "FACULTAD DE ADMINISTRACION", 'value' => 15]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "GESTION AMBIENTAL", 'value' => 16]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "GESTION DOCUMENTAL", 'value' => 17]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "GESTION LEGAL", 'value' => 18]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "GRADUADOS", 'value' => 19]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "INFRAESTRUCTURA", 'value' => 20]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "INTERNACIONALIZACION", 'value' => 21]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "INVESTIGACION", 'value' => 22]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "LACMA", 'value' => 23]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "LABORATORIOS FACULTAD CIENCIAS DE LA SALUD", 'value' => 24]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "LABOTATORIOS FACULTAD DE ADMINISTRACIÓN", 'value' => 25]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "PERMANENCIA", 'value' => 26]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "PLANEACION", 'value' => 27]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "PRESUPUESTO PARTICIPATIVO", 'value' => 28]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "RECTORIA", 'value' => 29]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "SECRETARIA GENERAL", 'value' => 30]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "SEGURIDAD Y SALUD EN EL TRABAJO", 'value' => 31]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "TALENTO HUMANO", 'value' => 32]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "TECNOLOGIA DE INFORMACION Y COMUNICACION", 'value' => 33]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "VICERRECTORIA ACADEMICA", 'value' => 34]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "VICERRECTORIA ADMINISTRATIVA Y FINANCIERA", 'value' => 35]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "VICERRECTORIA DE INVESTIGACION Y EXTENSION", 'value' => 36]);
        DB::table('proceso_que_solicita_presupuesto')->insert(['label' => "VIRTUALIDAD", 'value' => 37]);


        //*

        if(false){
            DB::table('actividades')->insert(['value' => 1, 'label' => 'Realizar apoyo técnico o profesional']);
            DB::table('actividades')->insert(['value' => 2, 'label' => 'Realizar apoyo para administración software Investiga y Gestión de la información']);
            DB::table('actividades')->insert(['value' => 3, 'label' => 'Realizar apoyo a la gestión estrategíca de grupos de invetigación y el mejoramiento en la categorización de investigadores ante MinCiencias, dirigir el proceso editorial de la revista SINERGIA y apoyar los trámites de certificación de productos de investigació']);
            DB::table('actividades')->insert(['value' => 4, 'label' => 'Realizar apoyo en temas de protección de la propiedad intelectual y la transferencia tecnológica y de conocimiento de la Institución ']);
            DB::table('actividades')->insert(['value' => 5, 'label' => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de Investigación']);
            DB::table('actividades')->insert(['value' => 6, 'label' => 'Prestar servicios de apoyo educativo dentro del proceso de Investigación ']);
            DB::table('actividades')->insert(['value' => 7, 'label' => 'Realizar apoyo y acompañamiento en la gestión de los programas del Centro de Emprendimiento, Innovación y trasnferencia tecnologica ']);
            DB::table('actividades')->insert(['value' => 8, 'label' => 'Realizar apoyo para desarrollar la evaluación de Proyectos de investigación, productos, artículos revista y escalafonamiento docente']);
            DB::table('actividades')->insert(['value' => 9, 'label' => 'Apoyar la generacion de productos derivados de proyectos de investigacion ']);
            DB::table('actividades')->insert(['value' => 10, 'label' => 'Prestar los servicios de preparación y presentación de impuestos y tasas para la protección de propiedad intelectual ']);
            DB::table('actividades')->insert(['value' => 11, 'label' => 'Realizar salidas académicas para presentación de resultados de investigación y  Actividades de trabajo de campo para recolección de datos, toma de muestras, Movilidad aerea']);
            DB::table('actividades')->insert(['value' => 12, 'label' => 'Realizar salidas académicas para presentación de resultados de investigación y  Actividades de trabajo de campo para recolección de datos, toma de muestras, Movilidad terrestre']);
            DB::table('actividades')->insert(['value' => 13, 'label' => 'Prestar servicio de hospedaje para las salidas academicas  y  Actividades de trabajo de campo para recolección de datos, toma de muestras']);
            DB::table('actividades')->insert(['value' => 14, 'label' => 'Realizar la compra de equipos requeridos en proyectos de investigación']);
            DB::table('actividades')->insert(['value' => 15, 'label' => 'Realizar compra de insumos para proyectos de investigación']);
            DB::table('actividades')->insert(['value' => 16, 'label' => 'Realizar afiliaciones a redes académicas e investigación y pagos de membresía']);
            DB::table('actividades')->insert(['value' => 17, 'label' => 'Realizar publicaciones y procesos editoriales.']);
            DB::table('actividades')->insert(['value' => 18, 'label' => 'Realizar  soporte tecnico de los sistemas academicos al proceso de  Admisiones , Registro y Control ']);
            DB::table('actividades')->insert(['value' => 19, 'label' => 'Realizar  apoyo  y asesoria  a estudiantes en los procesos de de  Admisiones , Registro y Control ']);
            DB::table('actividades')->insert(['value' => 20, 'label' => 'Realizar la compra de insumos como diplomas, actas, portadiplomas  para ceremonias de grado de la institución']);
            DB::table('actividades')->insert(['value' => 21, 'label' => 'Prestar servicios profesionales para apoyar el logro de las metas de programas e institucional, propuestas en el Proceso de Aseguramiento de la Calidad Académica']);
            DB::table('actividades')->insert(['value' => 22, 'label' => 'Preservar los libros, revistas, colecciones , bases de datos de la biblioteca Institucinal ']);
            DB::table('actividades')->insert(['value' => 23, 'label' => 'Actualizar programas y herramientas digitales de la Biblioteca ']);
            DB::table('actividades')->insert(['value' => 24, 'label' => 'Realizar apoyo técnico y/o profesional al proceso Biblioteca ']);
            DB::table('actividades')->insert(['value' => 25, 'label' => 'Realizar Mantenimiento de equipos (Antenas, Equipos RFID y TAG).']);
            DB::table('actividades')->insert(['value' => 26, 'label' => 'Desarrollar proyectos, organización y participación en eventos.']);
            DB::table('actividades')->insert(['value' => 27, 'label' => 'Realizar afiliaciones a redes académicas y pagos de membresía']);
            DB::table('actividades')->insert(['value' => 28, 'label' => 'Realizar apoyo tecnico, operativo y logistico al proceso de internacionalización']);
            DB::table('actividades')->insert(['value' => 29, 'label' => 'Realizar movilidad saliente y entrante para estudiantes  que  particpen en  eventos academicos ']);
            DB::table('actividades')->insert(['value' => 30, 'label' => 'Realizar apoyo tecnico y/o profesional en educación artistica y cultural al proceso de Bienestar Institucional']);
            DB::table('actividades')->insert(['value' => 31, 'label' => 'Realizar apoyo tecnico y/o profesional en la línea de deportes ofertada desde el proceso de Bienestar Institucional']);
            DB::table('actividades')->insert(['value' => 32, 'label' => 'Brindar apoyo asistencial a los programas de promoción de la salud y y prevención desarrollados para la comunidad institucional']);
            DB::table('actividades')->insert(['value' => 33, 'label' => 'Realizar apoyo tecnico y/o profesional en la parte administratova y logistica del proceso de Bienestar']);
            DB::table('actividades')->insert(['value' => 34, 'label' => 'Implementar Programa de seguridad alimentaria']);
            DB::table('actividades')->insert(['value' => 35, 'label' => 'Implementar servicios de bienestar institucional']);
            DB::table('actividades')->insert(['value' => 36, 'label' => 'Realizar afiliación anual ASCUN, fortalecimiento de las líneas de desarrollo humano, deporte y cultura.']);
            DB::table('actividades')->insert(['value' => 37, 'label' => 'Realizar mantenimiento a los implementos de las aulas de Bienestar Institucional']);
            DB::table('actividades')->insert(['value' => 38, 'label' => 'Realizar traslados de los grupos de deporte, cultura y otras activiades ']);
            DB::table('actividades')->insert(['value' => 39, 'label' => 'Realizar Montaje, diseño y proyección de obras de arte']);
            DB::table('actividades')->insert(['value' => 40, 'label' => 'Realizar adquisición y mantenimiento de instrumentos musicales ']);
            DB::table('actividades')->insert(['value' => 41, 'label' => 'Desarrollar actividades deportivas y recreativas ']);
            DB::table('actividades')->insert(['value' => 42, 'label' => 'Realizar envío masivo de correos, sms, IVR y recolección de leads e interesados, usada para comunicación interna y externa con los públicos de interés']);
            DB::table('actividades')->insert(['value' => 43, 'label' => 'Realizar apoyo en la planeación y desarrollo de estrategias en marketing e imagen en el proceso de Comunicaciones_Bienestar']);
            DB::table('actividades')->insert(['value' => 44, 'label' => 'Implementar el Plan de medios masivos y pauta digital, y fortalecimiento de la página web institucional']);
            DB::table('actividades')->insert(['value' => 45, 'label' => 'Realizar productos audiovisuales para campañas internas y externas de la Institución.']);
            DB::table('actividades')->insert(['value' => 46, 'label' => 'Realizar apoyo en diseño gráfico de material publicitario Institucional y diseño de campañas.']);
            DB::table('actividades')->insert(['value' => 47, 'label' => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la Institución']);
            DB::table('actividades')->insert(['value' => 48, 'label' => 'Implementar la señalética que se debe actualizar en el campus institucional']);
            DB::table('actividades')->insert(['value' => 49, 'label' => 'Adquirir souvenirs para estretagias institucionales y de comunicaciones']);
            DB::table('actividades')->insert(['value' => 50, 'label' => 'Realizar compra de equipos para el fortalecimiento del material audiovisual del Proceso de Comunicación y Mercadeo']);
            DB::table('actividades')->insert(['value' => 51, 'label' => 'Relizar apoyo profesionales de comunicación y diseño gráfico de los programas y servicios de bienestar a la comunidad institucional. ']);
            DB::table('actividades')->insert(['value' => 52, 'label' => 'Implementar la carnetización en la comunidad Institucional']);
            DB::table('actividades')->insert(['value' => 53, 'label' => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la Institución. Virtualidad - ']);
            DB::table('actividades')->insert(['value' => 54, 'label' => 'Implementar las estrategias del Plan de Comunicaciones y Mercadeo Institucional']);
            DB::table('actividades')->insert(['value' => 55, 'label' => 'Realizar los  programas de promoción de la salud y y prevención desarrollados para la comunidad institucional por parte del proceso de Bienestar Institucional ( Universidades preventivas)']);
            DB::table('actividades')->insert(['value' => 56, 'label' => 'Realizar apoyo al proceso de Vicerectoria Académica ']);
            DB::table('actividades')->insert(['value' => 57, 'label' => 'Realizar apoyo técnico y/o profesional al Centro de graduados ']);
            DB::table('actividades')->insert(['value' => 58, 'label' => 'Adquirir software para administración y gestión de la bolsa de empleo']);
            DB::table('actividades')->insert(['value' => 59, 'label' => 'Adquirir placas para los estudiantes de práctica de la institución']);
            DB::table('actividades')->insert(['value' => 60, 'label' => 'Realizar eventos académicos y de relacionamiento con graduados  y sector productivo ']);
            DB::table('actividades')->insert(['value' => 61, 'label' => 'Realizar pasantias empresariales  para estudiantes y docentes ']);
            DB::table('actividades')->insert(['value' => 62, 'label' => 'Realizar la gestión de la información del Observatorio de Permanencia y Calidad ']);
            DB::table('actividades')->insert(['value' => 63, 'label' => 'Realizar apoyo educativo en el proceso  de ingreso, permanencia y graduación ']);
            DB::table('actividades')->insert(['value' => 64, 'label' => 'Realizar  apoyo técnico y/o profesional en  producción audiovisual para la grabación, edición y posproduccion de videos y contenido audiovisual que acompañan los cursos ']);
            DB::table('actividades')->insert(['value' => 65, 'label' => 'Realizar apoyo técnico y/o profesional en  diseño gráfico, para la realización de piezas graficas y animaciones del  proceso de Virtualidad']);
            DB::table('actividades')->insert(['value' => 66, 'label' => 'Realizar apoyo técnico y/o profesional al proceso de  Virtualidad de cara al ensamble y diseño instruccional ']);
            DB::table('actividades')->insert(['value' => 67, 'label' => 'Realizar apoyo Profesional  con experiencia en instalación y migración de sistemas o plataformas tipo Moodle']);
            DB::table('actividades')->insert(['value' => 68, 'label' => 'Realizar apoyo logistico y administrativo en el Centro de Lenguas']);
            DB::table('actividades')->insert(['value' => 69, 'label' => 'Participar de membresias organizaciones nacionales e internacionales .  Fac. Administración.']);
            DB::table('actividades')->insert(['value' => 70, 'label' => 'Realizar acompañamiento al desarrollo de las estrategias académicas desarrolladas   de la Fac. Administación']);
            DB::table('actividades')->insert(['value' => 71, 'label' => 'Realizar apoyo logistico y administrativo en la Facultad de Administración.']);
            DB::table('actividades')->insert(['value' => 72, 'label' => 'Realizar la compra de materia prima como alimentos, granos, cereales, proteinas animales y vegetales y elementos de aseo para gastronomia.  Fac. Administración ']);
            DB::table('actividades')->insert(['value' => 73, 'label' => 'Realizar mantenimiento  (preventivo , correctivo)  de las aulas moviles, economato  y laboratorios de los programas de Gastronomia  Fac. Administración. ']);
            DB::table('actividades')->insert(['value' => 74, 'label' => 'Realizar salidas académicas regionales y nacionales. Facultad de Administración.']);
            DB::table('actividades')->insert(['value' => 75, 'label' => 'Prestar el servicio de acompañamiento a los procesos administrativos y logisticos de la Facultad de Arquitectura e Ingenieria. ']);
            DB::table('actividades')->insert(['value' => 76, 'label' => 'Participar de redes y   membresias   Fac. Arquitectura e ingenieria.']);
            DB::table('actividades')->insert(['value' => 77, 'label' => 'Realizar mantenimiento a los  laboratorios (preventivo , correctivo) , facultad de Arquitectura e Ingenieria']);
            DB::table('actividades')->insert(['value' => 78, 'label' => 'Realizar salidas académicas  asociadas a los curriculos de los programas y visitas de  practicas   de la facultad de Arquitectura e Ingenieria']);
            DB::table('actividades')->insert(['value' => 79, 'label' => 'Participar en membresias  u organizaciones académicas . Fac Salud']);
            DB::table('actividades')->insert(['value' => 80, 'label' => 'Prestar los servicios como ingeniero biomédico para la Facultad de Ciencias de la Salud. ']);
            DB::table('actividades')->insert(['value' => 81, 'label' => 'Prestar los servicios como químico para la Facultad de Ciencias de la Salud. ']);
            DB::table('actividades')->insert(['value' => 82, 'label' => 'Realizar diagnóstico y asesoría en biotecnología, como parte de las actividades de extensión de la Facultad de  Ciencias de la Salud (biotecnología). ']);
            DB::table('actividades')->insert(['value' => 83, 'label' => 'Realizar apoyo operativo y administrativo en los laboratorios  en la  facultad de Ciencias de la Salud']);
            DB::table('actividades')->insert(['value' => 84, 'label' => 'Realizar calibración de equipos. ']);
            DB::table('actividades')->insert(['value' => 85, 'label' => 'Realizar la compra de insumos, químicos, reactivos y kits de  diagnóstico']);
            DB::table('actividades')->insert(['value' => 86, 'label' => 'Realizar mantenimiento y reparación de equipos ']);
            DB::table('actividades')->insert(['value' => 87, 'label' => 'Realizar salidas académicas regionales y nacionales. Facultad de Salud']);
            DB::table('actividades')->insert(['value' => 88, 'label' => 'Prestar servicio de hospedaje para las salidas academicas  y  Actividades de trabajo de campo para recolección de datos, toma de muestras. Fac sociales']);
            DB::table('actividades')->insert(['value' => 89, 'label' => 'Realizar apoyo técnico y/o profesional a la facultad de Ciencias Sociales y de educación']);
            DB::table('actividades')->insert(['value' => 90, 'label' => 'Realizar afiliaciones a redes académicas. facultad de Ciencias Sociales y de educación ']);
            DB::table('actividades')->insert(['value' => 91, 'label' => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los  procesos academicos  de la Facultad de Ciencias Sociales y de Educación']);
            DB::table('actividades')->insert(['value' => 92, 'label' => 'Realizar movilidad académicas hacia diferentes experiencias representativas para los programas. facultad de Ciencias Sociales y de educación']);
            DB::table('actividades')->insert(['value' => 93, 'label' => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los procesos académicos de la institución. Vicerrectoría Académica']);
            DB::table('actividades')->insert(['value' => 94, 'label' => 'Realizar mantenimiento y reparación de equipos']);
            DB::table('actividades')->insert(['value' => 95, 'label' => 'Realizar calibración de equipos. LACMA']);
            DB::table('actividades')->insert(['value' => 96, 'label' => 'Prestar servicios de LACMA en el Valle de Aburra y municipios cercanos al departamento de Antioquia.']);
            DB::table('actividades')->insert(['value' => 97, 'label' => 'Participar en ensayos interlaboratorios de calidad externos']);
            DB::table('actividades')->insert(['value' => 98, 'label' => 'Prestar servicios profesionales en el laboratorio LACMA']);
            DB::table('actividades')->insert(['value' => 99, 'label' => 'Realizar el apoyo administrativo, técnico y logístico  en el proceso de Tecnologia y medios audiovisuales']);
            DB::table('actividades')->insert(['value' => 100, 'label' => 'Realizar la dotación de infraestructrua tecnologica requerida']);
            DB::table('actividades')->insert(['value' => 101, 'label' => 'Realizar mantenimiento de infraestructrua tecnologica requerida']);
            DB::table('actividades')->insert(['value' => 102, 'label' => 'Dotar y actualizar aplicativos de software de uso institucional']);
            DB::table('actividades')->insert(['value' => 103, 'label' => 'Realizar la Formulación del plan maestro integral de infraestructura física institucional']);
            DB::table('actividades')->insert(['value' => 104, 'label' => 'Mejorar Infraestructura física de la Institución Universitaria Colegio Mayor de Antioquia']);
            DB::table('actividades')->insert(['value' => 105, 'label' => 'Realizar mejoramiento  y adecuación de de las áreas de estudio de los bloques institucionales']);
            DB::table('actividades')->insert(['value' => 106, 'label' => 'Realizar mejoramiento y recuperación de las zonas verdes de la institución']);
            DB::table('actividades')->insert(['value' => 107, 'label' => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de Infraestructura Fisica ']);
            DB::table('actividades')->insert(['value' => 108, 'label' => 'Realizar el apoyo profesional al proceso de Infraestructura Fisica ']);
            DB::table('actividades')->insert(['value' => 109, 'label' => 'Realizar la automatización de puertas principales.']);
            DB::table('actividades')->insert(['value' => 110, 'label' => 'Reserva Realizar la Formulación del plan maestro integral de infraestructura física intitucional']);
            DB::table('actividades')->insert(['value' => 111, 'label' => 'Realizar adecuaciones electricas para el fortalecimiento de la infraestructura']);
            DB::table('actividades')->insert(['value' => 112, 'label' => 'Realizar montajes, instalaciones y las adecuaciones  requeridas dentro de la infraestructura física de la institución']);

        }
//selects
        DB::table('categoria')->insert(['label' => "AREA PROTEGIDA", 'value' => 1]);
        DB::table('categoria')->insert(['label' => "ARL", 'value' => 2]);
        DB::table('categoria')->insert(['label' => "BASES DE DATOS", 'value' => 3]);
        DB::table('categoria')->insert(['label' => "CALIBRACIONES", 'value' => 4]);
        DB::table('categoria')->insert(['label' => "CAJA MENOR", 'value' => 5]);
        DB::table('categoria')->insert(['label' => "CONTRATISTA", 'value' => 6]);
        DB::table('categoria')->insert(['label' => "CUOTA DE FISCALIZACION", 'value' => 7]);
        DB::table('categoria')->insert(['label' => "EDICTOS", 'value' => 8]);
        DB::table('categoria')->insert(['label' => "EQUIPOS E INTRUMENTOS", 'value' => 9]);
        DB::table('categoria')->insert(['label' => "ESTIMULOS DOCENTES", 'value' => 10]);
        DB::table('categoria')->insert(['label' => "EVENTOS", 'value' => 11]);
        DB::table('categoria')->insert(['label' => "EXEMENES MEDICOS", 'value' => 12]);
        DB::table('categoria')->insert(['label' => "GASTOS DE VIAJE-ALIMENTACION", 'value' => 13]);
        DB::table('categoria')->insert(['label' => "GASTOS DE VIAJE-HOSPEDAJE", 'value' => 14]);
        DB::table('categoria')->insert(['label' => "GASTOS DE VIAJE-TRASNPORTE", 'value' => 15]);
        DB::table('categoria')->insert(['label' => "GASTOS LEGALES", 'value' => 16]);
        DB::table('categoria')->insert(['label' => "GMF", 'value' => 17]);
        DB::table('categoria')->insert(['label' => "INSCRIPCIONES,AFILIACIONES Y RENOVACIONES", 'value' => 18]);
        DB::table('categoria')->insert(['label' => "INSUMOS", 'value' => 19]);
        DB::table('categoria')->insert(['label' => "INSTALACIONES Y REPARACIONES", 'value' => 20]);
        DB::table('categoria')->insert(['label' => "LICENCIAS Y MEMBRESIAS", 'value' => 21]);
        DB::table('categoria')->insert(['label' => "MANTENIMIENTO", 'value' => 22]);
        DB::table('categoria')->insert(['label' => "MOBILIARIO", 'value' => 23]);
        DB::table('categoria')->insert(['label' => "MOVILIDAD ACADEMICA", 'value' => 24]);
        DB::table('categoria')->insert(['label' => "PATENTES", 'value' => 25]);
        DB::table('categoria')->insert(['label' => "PLAN DE CAPACITACION", 'value' => 26]);
        DB::table('categoria')->insert(['label' => "PLAN DE COMUNICACIÓN Y MERCADO Y PLAN DE MEDIOS", 'value' => 2]);
        DB::table('categoria')->insert(['label' => "PLATAFORMA DE ENVÍO MASIVO DE CORREOS, SMS, IVR Y RECOLECCIÓN DE LEADS E INTERESADOS", 'value' => 2]);
        DB::table('categoria')->insert(['label' => "PRACTICANTE", 'value' => 29]);
        DB::table('categoria')->insert(['label' => "PUBLICACIONES Y PROCESOS EDITORIALES", 'value' => 30]);
        DB::table('categoria')->insert(['label' => "REGIONALIZACION-ALIMENTACION", 'value' => 31]);
        DB::table('categoria')->insert(['label' => "REGIONALIZACION-HOSPEDAJE", 'value' => 32]);
        DB::table('categoria')->insert(['label' => "REGIONALIZACION-TRANSPORTE", 'value' => 33]);
        DB::table('categoria')->insert(['label' => "SEGUROS Y POLIZAS", 'value' => 34]);
        DB::table('categoria')->insert(['label' => "SEGURIDAD ALIMENTARIA", 'value' => 35]);
        DB::table('categoria')->insert(['label' => "SERVICIO DE IMPRESORAS Y DE FOTOCOPIAS", 'value' => 36]);
        DB::table('categoria')->insert(['label' => "SERVICIO DE MENSAJERIA", 'value' => 37]);
        DB::table('categoria')->insert(['label' => "SERVICIOS DE AUDITORIA Y ACREDITACION", 'value' => 38]);
        DB::table('categoria')->insert(['label' => "SERVICIOS PUBLICOS", 'value' => 39]);
        DB::table('categoria')->insert(['label' => "SOFTWARE", 'value' => 40]);
        DB::table('categoria')->insert(['label' => "SOPORTE", 'value' => 41]);
        DB::table('categoria')->insert(['label' => "SOUVENIRS", 'value' => 42]);
        DB::table('categoria')->insert(['label' => "SUBVENCION", 'value' => 43]);
        DB::table('categoria')->insert(['label' => "SUMINISTRO DE COMIDAD Y REFRIGERIOS", 'value' => 44]);
        DB::table('categoria')->insert(['label' => "TELEFONIACELULAR E INTERNET", 'value' => 45]);
        DB::table('categoria')->insert(['label' => "VIATICOS", 'value' => 46]);


        DB::table('vigencias_anteriores')->insert(['label' => "Si", 'value' => "Si"]);
        DB::table('vigencias_anteriores')->insert(['value' => "No", 'label' => "No",]);
    }
}
/*
php artisan migrate --path=/database/migrations/nombre_de_la_migracion.php
php artisan db:seed --class=TablasFrontendSeeder

*/