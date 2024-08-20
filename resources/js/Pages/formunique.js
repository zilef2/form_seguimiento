import { useForm } from '@inertiajs/vue3';

export const form = useForm({
identificacion_user: '',
proceso_que_solicita_presupuesto: '',
necesidad: '',
justificacion: '',
actividad: '',
categoria: '', //caso especial:Otras
unidad_de_medida: '',
cantidad: 0,
valor_unitario: 0,
valor_total_solicitatdo_por_necesidad: 0,
periodo_de_inicio_de_ejecucion: '',
vigencias_anteriores: '', //si_no
valor_asignado_en_la_vigencia_anterior: 0,  //backend


//multiples
procesos_involucrados: [], //nick: procesos articulados
plan_de_mejoramiento_al_que_apunta_la_necesidad: [], //plan mm
linea_del_plan_desarrollo_al_que_apunta_la_necesidad: [], //lineas de pdi
frecuencia_de_uso: '', //selec
mantenimientos_requeridos: '', //selec
capacidad_instalada: '', //caso especial:Si, ¿Cual?
riesgo_de_la_inversion: '', //selecMultiple (NA)
anexos: '',

user_id: 0,
enviado:0,
valor_total_de_la_solicitud_actual:0,


});


/*transformaciones simples


 */
/*transformaciones compuestas


 */
