<?php

namespace App\Exports;

use App\Models\formulario;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FormExport implements WithHeadingRow, ShouldAutoSize, FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return formulario::query()->Where('enviado', 0);
    }
    
    public function map($form): array
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
        return [
            $form->identificacion_user,
            $proceso_que_solicita_presupuesto[$form->proceso_que_solicita_presupuesto],
            $form->necesidad,
            $form->justificacion,
            $form->actividad,
            $form->categoria,
            $form->unidad_de_medida,
            $form->cantidad,
            $form->valor_unitario,
            $form->valor_total_solicitatdo_por_necesidad,
            $form->periodo_de_inicio_de_ejecucion,
            $form->vigencias_anteriores,
            $form->valor_asignado_en_la_vigencia_anterior,
            $form->procesos_involucrados,
            $form->plan_de_mejoramiento_al_que_apunta_la_necesidad,
            $form->linea_del_plan_desarrollo_al_que_apunta_la_necesidad,
            $form->frecuencia_de_uso,
            $form->mantenimientos_requeridos,
            $form->capacidad_instalada,
            $form->riesgo_de_la_inversion,
            $form->valor_total_de_la_solicitud_actual,
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function headings(): array
    {
        return [
            'Identificacion',
            'Proceso que solicita presupuesto',
            'Necesidad',
            'Justificacion',
            'Actividad',
            'Categoria',
            'Unidad de medida',
            'Cantidad',
            'Valor unitario',
            'Valor total solicitatdo por necesidad',
            'Periodo de inicio de ejecucion',
            'Vigencias anteriores',
            'Valor asignado en la vigencia anterior',
            'Procesos involucrados',
            'Plan de mejoramiento al que apunta la necesidad',
            'Linea del plan desarrollo al que apunta la necesidad',
            'Frecuencia de uso',
            'Mantenimientos requeridos',
            'Capacidad instalada',
            'Riesgo de la inversion',
            'Valor total de la solicitud actual',
        ];
    }
}
