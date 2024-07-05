<?php

namespace App\helpers;

use DateTime;

// use Hamcrest\Type\IsInteger;

class HelpExcel{

    public static function getFechaExcel($lafecha,$inDate = false) {
        //the date fix
        if(is_numeric($lafecha)){ //toproof
            $unixDate = ($lafecha - 25568) * 86400;
            // $unixDate = ($lafecha - 25569) * 86400;
            $readableDate = date('Y/m/d', $unixDate);
            $fechaReturn = DateTime::createFromFormat('Y/m/d', $readableDate);

            if($fechaReturn === false){
                $fechaReturn = DateTime::createFromFormat('Y/m/d', $lafecha);
                if ($fechaReturn === false) {
                    $fechaReturn = DateTime::createFromFormat('d/m/Y', $lafecha);
                    if ($fechaReturn === false) {
                        throw new \Exception('Fecha inválida 1');
                        // throw new \Exception('Fecha inválida '.$lafecha. ' --++--');
                        return null;
                    }
                }
            }
        }else{
            $fechaReturn = DateTime::createFromFormat('Y/m/d', $lafecha);
            if ($fechaReturn === false) {
                $fechaReturn = DateTime::createFromFormat('d/m/Y', $lafecha);
                if ($fechaReturn === false) {
                    throw new \Exception('Fecha inválida 2'.$lafecha);
                    return null;
                }
            }
        }

        if ($inDate) {
            return $fechaReturn->format('Y-m-d');
        }else return $fechaReturn;
    }

    public function validarArchivoExcel($request){
        $exten = $request->archivo1->getClientOriginalExtension();
        // Validar que el archivo es de Excel
        if ($exten != 'xlsx' && $exten != 'xls') {
            return 'El archivo debe ser de Excel';
        }
        $pesoKilobyte = ((int)($request->archivo1->getSize())) / (1024);
        if ($pesoKilobyte > (12*1024)) { //debe pesar menos de 12MB
            return 'El archivo debe pesar menos de 12MB';
        }
        return '';
    }
    
    
    /*
     * 
        CONSTANTES
     */

    public static function Uproceso_que_solicita_presupuesto()
    {
        $proceso_que_solicita_presupuesto = [
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
        return $proceso_que_solicita_presupuesto;
    }


    public static function Mplanmejoramientonecesidad(){//2
        $planmejoramientonecesidad = [
            1 => 'PMM Institucional',
            2 => 'PMM Programas',
            3 => 'PMM Auditorías',
            0 => 'Ninguno',
        ];
        return $planmejoramientonecesidad;
    }

    public static function Mlineadelplan(){//3
        $lineadelplan = [
            1 => '1. Academia Transformadora de Vidas',
            2 => '2. Intercambio de Saberes para la Transformación del Entorno Social, Productivo y Científico',
            3 => '3. Ecosistema Tecnológico Colmayor',
            4 => '4. Sostenibilidad y Gestión Humana Integral',
        ];
        return $lineadelplan;
    }
    
            
     public static function Mlista_pros_presupuestp(){//1
         $lista_pros_presupuestp = [
             1 => "Bienestar",
             2 => "Bienes y Servicios",
             3 => "Comunicaciones y Mercadeo",
             4 => "Gestión Ambiental Seguridad y Salud en el Trabajo",
             5 => "Infraestructura Física",
             6 => "Sistema de Gestión Integral - SGI -",
             7 => "Tecnología y Medios Audiovisuales",
             8 => "Talento Humano",
             9 => "Ninguno",
         ];
         return $lista_pros_presupuestp;
     }
     public static function Ecategoria() //E: especial U: unica M: multiple
    {
        $categoria = [
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
        return $categoria;
    }
}