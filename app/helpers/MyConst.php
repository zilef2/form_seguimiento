<?php

namespace App\helpers;

use App\Models\User;
use Carbon\Carbon;
use Carbon\Translator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class MyConst {

    public static final function proceso_que_solicita_presupuesto(): array
    {
        return [
            1 => "Admisiones, Registro y Control",
            2 => "Aseguramiento de la Calidad Académica",
            3 => "Biblioteca",
            4 => "Bienes y Servicios",
            5 => "Bienestar Institucional",
            6 => "Centro de Lenguas",
            7 => "Comunicación y Mercadeo",
            8 => "Contabilidad",
            9 => "Control Interno",
            10 => "Extensión Académica y Proyección Social",
            11 => "Facultad de Administración",
            12 => "Facultad de Arquitectura e Ingeniería",
            13 => "Facultad de Ciencias de la Salud",
            14 => "Facultad de Ciencias Sociales y Educación",
            15 => "Formación para el Trabajo y el Desarrollo Humano",
            16 => "Gestión Administrativa y Financiera",
            17 => "Gestión Ambiental",
            18 => "Gestión de Infraestructura Física",
            19 => "Gestión de la Calidad",
            20 => "Gestión de la Seguridad y Salud en el Trabajo",
            21 => "Gestión de Tecnología y Medios Audiovisuales",
            22 => "Gestión del Talento Humano",
            23 => "Gestión Documental",
            24 => "Gestión Jurídica",
            25 => "Graduados",
            26 => "Ingreso, Permanencia y Graduación",
            27 => "Innovación, Emprendimiento y Transferencia Tecnológica",
            28 => "Internacionalización",
            29 => "Investigación",
            30 => "Laboratorios Facultad Arquitectura e Ingeniería",
            31 => "Laboratorios Facultad Ciencias de la Salud",
            32 => "Laboratorios Facultad de Administración",
            33 => "LACMA",
            34 => "Planeación Institucional",
            35 => "Presupuesto",
            36 => "Presupuesto Participativo",
            37 => "Rectoría",
            38 => "Secretaria General",
            39 => "Tesorería",
            40 => "Vicerrectoría Académica",
            41 => "Vicerrectoría de Investigación y Extensión",
            42 => "Virtualidad",
        ];
    }

    public static final function procesos_involucrados(): array
    {
        return [
            1 => "Bienestar",
            2 => "Bienes y Servicios",
            3 => "Comunicaciones y Mercadeo",
            4 => "Gestión Ambiental Seguridad y Salud en el Trabajo",
            5 => "Infraestructura Física",
            6 => "Sistema de Gestión Integral - SGI -",
            7 => "Tecnología y Medios Audiovisuales",
            8 => "Talento Humano",
            9 => "Ninguno"
        ];
    }
    public static final function plan_de_mejoramiento_al_que_apunta_la_necesidad(): array{
      return  [
            0 => 'Ninguno',
            1 => 'PMM Institucional',
            2 => 'PMM Programas',
            3 => 'PMM Auditorías',
      ];
    }
    public static final function linea_del_plan_desarrollo_al_que_apunta_la_necesidad(): array{
        return [
            1 => '1. Academia Transformadora de Vidas',
            2 => '2. Intercambio de Saberes para la Transformación del Entorno Social, Productivo y Científico',
            3 => '3. Ecosistema Tecnológico Colmayor',
            4 => '4. Sostenibilidad y Gestión Humana Integral',
        ];
    }
    
    //actividades - is not a list now 21jun2024 (not using)
    public static final function actividades(): array{
        return [
            1 => 'Realizar apoyo técnico o profesional',
            2 => 'Realizar apoyo para administración software Investiga y Gestión de la información',
            3 => 'Realizar apoyo a la gestión estrategíca de grupos de invetigación y el mejoramiento en la categorización de investigadores ante MinCiencias, dirigir el proceso editorial de la revista SINERGIA y apoyar los trámites de certificación de productos de investigació',
            4 => 'Realizar apoyo en temas de protección de la propiedad intelectual y la transferencia tecnológica y de conocimiento de la Institución ',
            5 => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de Investigación',
            6 => 'Prestar servicios de apoyo educativo dentro del proceso de Investigación ',
            7 => 'Realizar apoyo y acompañamiento en la gestión de los programas del Centro de Emprendimiento, Innovación y trasnferencia tecnologica ',
            8 => 'Realizar apoyo para desarrollar la evaluación de Proyectos de investigación, productos, artículos revista y escalafonamiento docente',
            9 => 'Apoyar la generacion de productos derivados de proyectos de investigacion ',
            10 => 'Prestar los servicios de preparación y presentación de impuestos y tasas para la protección de propiedad intelectual ',
            11 => 'Realizar salidas académicas para presentación de resultados de investigación y  Actividades de trabajo de campo para recolección de datos, toma de muestras, Movilidad aerea',
            12 => 'Realizar salidas académicas para presentación de resultados de investigación y  Actividades de trabajo de campo para recolección de datos, toma de muestras, Movilidad terrestre',
            13 => 'Prestar servicio de hospedaje para las salidas academicas  y  Actividades de trabajo de campo para recolección de datos, toma de muestras',
            14 => 'Realizar la compra de equipos requeridos en proyectos de investigación',
            15 => 'Realizar compra de insumos para proyectos de investigación',
            16 => 'Realizar afiliaciones a redes académicas e investigación y pagos de membresía',
            17 => 'Realizar publicaciones y procesos editoriales.',
            18 => 'Realizar  soporte tecnico de los sistemas academicos al proceso de  Admisiones , Registro y Control ',
            19 => 'Realizar  apoyo  y asesoria  a estudiantes en los procesos de de  Admisiones , Registro y Control ',
            20 => 'Realizar la compra de insumos como diplomas, actas, portadiplomas  para ceremonias de grado de la institución',
            21 => 'Prestar servicios profesionales para apoyar el logro de las metas de programas e institucional, propuestas en el Proceso de Aseguramiento de la Calidad Académica',
            22 => 'Preservar los libros, revistas, colecciones , bases de datos de la biblioteca Institucinal ',
            23 => 'Actualizar programas y herramientas digitales de la Biblioteca ',
            24 => 'Realizar apoyo técnico y/o profesional al proceso Biblioteca ',
            25 => 'Realizar Mantenimiento de equipos (Antenas, Equipos RFID y TAG).',
            26 => 'Desarrollar proyectos, organización y participación en eventos.',
            27 => 'Realizar afiliaciones a redes académicas y pagos de membresía',
            28 => 'Realizar apoyo tecnico, operativo y logistico al proceso de internacionalización',
            29 => 'Realizar movilidad saliente y entrante para estudiantes  que  particpen en  eventos academicos ',
            30 => 'Realizar apoyo tecnico y/o profesional en educación artistica y cultural al proceso de Bienestar Institucional',
            31 => 'Realizar apoyo tecnico y/o profesional en la línea de deportes ofertada desde el proceso de Bienestar Institucional',
            32 => 'Brindar apoyo asistencial a los programas de promoción de la salud y y prevención desarrollados para la comunidad institucional',
            33 => 'Realizar apoyo tecnico y/o profesional en la parte administratova y logistica del proceso de Bienestar',
            34 => 'Implementar Programa de seguridad alimentaria',
            35 => 'Implementar servicios de bienestar institucional',
            36 => 'Realizar afiliación anual ASCUN, fortalecimiento de las líneas de desarrollo humano, deporte y cultura.',
            37 => 'Realizar mantenimiento a los implementos de las aulas de Bienestar Institucional',
            38 => 'Realizar traslados de los grupos de deporte, cultura y otras activiades ',
            39 => 'Realizar Montaje, diseño y proyección de obras de arte',
            40 => 'Realizar adquisición y mantenimiento de instrumentos musicales ',
            41 => 'Desarrollar actividades deportivas y recreativas ',
            42 => 'Realizar envío masivo de correos, sms, IVR y recolección de leads e interesados, usada para comunicación interna y externa con los públicos de interés',
            43 => 'Realizar apoyo en la planeación y desarrollo de estrategias en marketing e imagen en el proceso de Comunicaciones_Bienestar',
            44 => 'Implementar el Plan de medios masivos y pauta digital, y fortalecimiento de la página web institucional',
            45 => 'Realizar productos audiovisuales para campañas internas y externas de la Institución.',
            46 => 'Realizar apoyo en diseño gráfico de material publicitario Institucional y diseño de campañas.',
            47 => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la Institución',
            48 => 'Implementar la señalética que se debe actualizar en el campus institucional',
            49 => 'Adquirir souvenirs para estretagias institucionales y de comunicaciones',
            50 => 'Realizar compra de equipos para el fortalecimiento del material audiovisual del Proceso de Comunicación y Mercadeo',
            51 => 'Relizar apoyo profesionales de comunicación y diseño gráfico de los programas y servicios de bienestar a la comunidad institucional. ',
            52 => 'Implementar la carnetización en la comunidad Institucional',
            53 => 'Realizar apoyo en el desarrollo de estrategias de comunicaciones y mercadeo de la Institución. Virtualidad - ',
            54 => 'Implementar las estrategias del Plan de Comunicaciones y Mercadeo Institucional',
            55 => 'Realizar los  programas de promoción de la salud y y prevención desarrollados para la comunidad institucional por parte del proceso de Bienestar Institucional ( Universidades preventivas)',
            56 => 'Realizar apoyo al proceso de Vicerectoria Académica ',
            57 => 'Realizar apoyo técnico y/o profesional al Centro de graduados ',
            58 => 'Adquirir software para administración y gestión de la bolsa de empleo',
            59 => 'Adquirir placas para los estudiantes de práctica de la institución',
            60 => 'Realizar eventos académicos y de relacionamiento con graduados  y sector productivo ',
            61 => 'Realizar pasantias empresariales  para estudiantes y docentes ',
            62 => 'Realizar la gestión de la información del Observatorio de Permanencia y Calidad ',
            63 => 'Realizar apoyo educativo en el proceso  de ingreso, permanencia y graduación ',
            64 => 'Realizar  apoyo técnico y/o profesional en  producción audiovisual para la grabación, edición y posproduccion de videos y contenido audiovisual que acompañan los cursos ',
            65 => 'Realizar apoyo técnico y/o profesional en  diseño gráfico, para la realización de piezas graficas y animaciones del  proceso de Virtualidad',
            66 => 'Realizar apoyo técnico y/o profesional al proceso de  Virtualidad de cara al ensamble y diseño instruccional ',
            67 => 'Realizar apoyo Profesional  con experiencia en instalación y migración de sistemas o plataformas tipo Moodle',
            68 => 'Realizar apoyo logistico y administrativo en el Centro de Lenguas',
            69 => 'Participar de membresias organizaciones nacionales e internacionales .  Fac. Administración.',
            70 => 'Realizar acompañamiento al desarrollo de las estrategias académicas desarrolladas   de la Fac. Administación',
            71 => 'Realizar apoyo logistico y administrativo en la Facultad de Administración.',
            72 => 'Realizar la compra de materia prima como alimentos, granos, cereales, proteinas animales y vegetales y elementos de aseo para gastronomia.  Fac. Administración ',
            73 => 'Realizar mantenimiento  (preventivo , correctivo)  de las aulas moviles, economato  y laboratorios de los programas de Gastronomia  Fac. Administración. ',
            74 => 'Realizar salidas académicas regionales y nacionales. Facultad de Administración.',
            75 => 'Prestar el servicio de acompañamiento a los procesos administrativos y logisticos de la Facultad de Arquitectura e Ingenieria. ',
            76 => 'Participar de redes y   membresias   Fac. Arquitectura e ingenieria.',
            77 => 'Realizar mantenimiento a los  laboratorios (preventivo , correctivo) , facultad de Arquitectura e Ingenieria',
            78 => 'Realizar salidas académicas  asociadas a los curriculos de los programas y visitas de  practicas   de la facultad de Arquitectura e Ingenieria',
            79 => 'Participar en membresias  u organizaciones académicas . Fac Salud',
            80 => 'Prestar los servicios como ingeniero biomédico para la Facultad de Ciencias de la Salud. ',
            81 => 'Prestar los servicios como químico para la Facultad de Ciencias de la Salud. ',
            82 => 'Realizar diagnóstico y asesoría en biotecnología, como parte de las actividades de extensión de la Facultad de  Ciencias de la Salud (biotecnología). ',
            83 => 'Realizar apoyo operativo y administrativo en los laboratorios  en la  facultad de Ciencias de la Salud',
            84 => 'Realizar calibración de equipos. ',
            85 => 'Realizar la compra de insumos, químicos, reactivos y kits de  diagnóstico',
            86 => 'Realizar mantenimiento y reparación de equipos ',
            87 => 'Realizar salidas académicas regionales y nacionales. Facultad de Salud',
            88 => 'Prestar servicio de hospedaje para las salidas academicas  y  Actividades de trabajo de campo para recolección de datos, toma de muestras. Fac sociales',
            89 => 'Realizar apoyo técnico y/o profesional a la facultad de Ciencias Sociales y de educación',
            90 => 'Realizar afiliaciones a redes académicas. facultad de Ciencias Sociales y de educación ',
            91 => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los  procesos academicos  de la Facultad de Ciencias Sociales y de Educación',
            92 => 'Realizar movilidad académicas hacia diferentes experiencias representativas para los programas. facultad de Ciencias Sociales y de educación',
            93 => 'Realizar apoyo al desarrollo de estrategias que favorezcan a los procesos académicos de la institución. Vicerrectoría Académica',
            94 => 'Realizar mantenimiento y reparación de equipos',
            95 => 'Realizar calibración de equipos. LACMA',
            96 => 'Prestar servicios de LACMA en el Valle de Aburra y municipios cercanos al departamento de Antioquia.',
            97 => 'Participar en ensayos interlaboratorios de calidad externos',
            98 => 'Prestar servicios profesionales en el laboratorio LACMA',
            99 => 'Realizar el apoyo administrativo, técnico y logístico  en el proceso de Tecnologia y medios audiovisuales',
            100 => 'Realizar la dotación de infraestructrua tecnologica requerida',
            101 => 'Realizar mantenimiento de infraestructrua tecnologica requerida',
            102 => 'Dotar y actualizar aplicativos de software de uso institucional',
            103 => 'Realizar la Formulación del plan maestro integral de infraestructura física institucional',
            104 => 'Mejorar Infraestructura física de la Institución Universitaria Colegio Mayor de Antioquia',
            105 => 'Realizar mejoramiento  y adecuación de de las áreas de estudio de los bloques institucionales',
            106 => 'Realizar mejoramiento y recuperación de las zonas verdes de la institución',
            107 => 'Realizar el apoyo administrativo, técnico y logístico al  proceso de Infraestructura Fisica ',
            108 => 'Realizar el apoyo profesional al proceso de Infraestructura Fisica ',
            109 => 'Realizar la automatización de puertas principales.',
            110 => 'Reserva Realizar la Formulación del plan maestro integral de infraestructura física intitucional',
            111 => 'Realizar adecuaciones electricas para el fortalecimiento de la infraestructura',
            112 => 'Realizar montajes, instalaciones y las adecuaciones  requeridas dentro de la infraestructura física de la institución',
        ];
    }
    
    public static final function categoria(): array{
        return [
            1 => "Area Protegida",
            2 => "ARL",
            3 => "Bases de Datos",
            4 => "Calibraciones",
            5 => "Caja menor",
            6 => "Contratista",
            7 => "Cuota de fiscalizacion",
            8 => "Edictos",
            9 => "Equipos e intrumentos",
            10 => "Estimulos docentes",
            11 => "Eventos",
            12 => "Exemenes medicos",
            13 => "Gastos de viaje alimentacion",
            14 => "Gastos de viaje hospedaje",
            15 => "Gastos de viaje trasnporte",
            16 => "Gastos legales",
            17 => "GMF",
            18 => "Inscripciones,afiliaciones y renovaciones",
            19 => "Insumos",
            20 => "Instalaciones y reparaciones",
            21 => "Licencias y membresias",
            22 => "Mantenimiento",
            23 => "Mobiliario",
            24 => "Movilidad academica",
            25 => "Patentes",
            26 => "Plan de capacitacion",
            27 => "Plan de comunicación y mercado y plan de medios",
            28 => "Plataforma de envío masivo de correos, sms, ivr y recolección de leads e interesados",
            29 => "Practicante",
            30 => "Publicaciones y procesos editoriales",
            31 => "Regionalizacion alimentacion",
            32 => "Regionalizacion hospedaje",
            33 => "Regionalizacion transporte",
            34 => "Seguros y polizas",
            35 => "Seguridad alimentaria",
            36 => "Servicio de impresoras y de fotocopias",
            37 => "Servicio de mensajeria",
            38 => "Servicios de auditoria y acreditacion",
            39 => "Servicios publicos",
            40 => "Software",
            41 => "Soporte",
            42 => "Souvenirs",
            43 => "Subvencion",
            44 => "Suministro de comidad y refrigerios",
            45 => "Telefoniacelular e internet",
            46 => "Viaticos",
            47 => "Otra",
        ];

    }

    //not used yet
    public static final function frecuencia_de_uso(): array
    {
        return DB::table('selecsForm')->Where('tipo', 'frecuencia_de_uso')->pluck('nombre', 'id')->toArray();
    }
    
    //not used yet
    public static final function riesgo_de_la_inversion(): array
    {
        return DB::table('selecsForm')->Where('tipo', 'riesgo_de_la_inversion')->pluck('nombre','id')->toArray();
    }
}
?>