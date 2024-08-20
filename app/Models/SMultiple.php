<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SMultiple extends Model
{
    use HasFactory;

    protected $fillable = [
//        'procesos_involucrados',
//        'plan_de_mejoramiento_al_que_apunta_la_necesidad',
//        'linea_del_plan_desarrollo_al_que_apunta_la_necesidad',
//        'frecuencia_de_uso',
//        'mantenimientos_requeridos',
//        'capacidad_instalada',
//        'riesgo_de_la_inversion',
        'tipo',
        'value',
        'formulario_id',
    ];

    public function Formulario(): BelongsTo
    {
        return $this->belongsTo(Formulario::class);
    }

}
