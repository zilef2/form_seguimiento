<?php

namespace App\helpers;

use App\Models\User;
use Carbon\Carbon;
use Carbon\Translator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class MyConst {

    public static final function procesoQueSolicitaPresupuesto(): array
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

}
?>
