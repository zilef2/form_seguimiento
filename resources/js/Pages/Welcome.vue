<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import SwitchDarkMode from '@/Components/SwitchDarkMode.vue';
import {Head} from '@inertiajs/vue3';//Link
import {reactive, watchEffect} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { form } from './form';
import InputError from "@/Components/InputError.vue";
import SelectInput from "@/Components/SelectInput.vue";
import {number_format} from "@/global";
import Toast from "@/Components/Toast.vue";

const props = defineProps({
    cedLideres: Object,
    losSelect: Object,
    cedLideresGuardados: Object,
    cedLideresDiligenciados: Object,
    TodosDiligenciados: Boolean,
})

let anioActual = new Date().getFullYear();

const handleFile = (() => {
    if (form.anexos) {
        // form.type = form.anexos.type
        // if (form.type === "application/pdf") {
            var formpeso = (Math.round(form.anexos.size / (1024 * 1024)))
            if (formpeso < data.TamanoMAX) {
                // form.archivoAux = event.target.files;
                form.nombre = form.anexos.name.slice(0, -4)
                data.tamanin = "El archivo pesa aproximadamente " + formpeso + " MB";
                console.log(data.tamanin)
            } else {
                data.mensajes = 'El peso del archivo supera los 5MB'
            }
        // } else {
        //     data.mensajes = 'El archivo debe ser un PDF'
        // }
    }
})

const data = reactive({
    TamanoMAX : (1024 * 1024) * 5, //5MB
    tamanin:'',
    mensajes:'',
    showContent: false,
    nombreLider:'',
    identificacion_disbled:false,
    colorDisabled:'',

    //selects
    proceso_que_solicita_presupuesto: [
        {label: "RECTORIA", value: "RECTORIA"},
        {label: "BIENESTAR INSTITUCIONAL", value: "BIENESTAR INSTITUCIONAL"},
        {label: "CONTROL INTERNO", value: "CONTROL INTERNO"},
        {label: "SECRETARIA GENERAL", value: "SECRETARIA GENERAL"},
        {label: "GESTION LEGAL", value: "GESTION LEGAL"},
        {label: "GESTION DOCUMENTAL", value: "GESTION DOCUMENTAL"},
        {label: "PLANEACION", value: "PLANEACION"},
        {label: "PRESUPUESTO PARTICIPATIVO", value: "PRESUPUESTO PARTICIPATIVO"},
        {label: "ASEGURAMIENTO DE LA CALIDAD ACADÉMICA", value: "ASEGURAMIENTO DE LA CALIDAD ACADÉMICA"},
        {label: "COMUNICACIONES", value: "COMUNICACIONES"},
        {label: "VICERRECTORIA ADMINISTRATIVA Y FINANCIERA", value: "VICERRECTORIA ADMINISTRATIVA Y FINANCIERA"},
        {label: "CONTABILIDAD", value: "CONTABILIDAD"},
        {label: "TALENTO HUMANO", value: "TALENTO HUMANO"},
        {label: "SEGURIDAD Y SALUD EN EL TRABAJO", value: "SEGURIDAD Y SALUD EN EL TRABAJO"},
        {label: "TECNOLOGIA DE INFORMACION Y COMUNICACION", value: "TECNOLOGIA DE INFORMACION Y COMUNICACION"},
        {label: "BIENES Y SERVICIOS", value: "BIENES Y SERVICIOS"},
        {label: "INFRAESTRUCTURA", value: "INFRAESTRUCTURA"},
        {label: "GESTION AMBIENTAL", value: "GESTION AMBIENTAL"},
        {label: "VICERRECTORIA ACADEMICA", value: "VICERRECTORIA ACADEMICA"},
        {label: "FACULTAD DE ADMINISTRACION", value: "FACULTAD DE ADMINISTRACION"},
        {label: "LABOTATORIOS FACULTAD DE ADMINISTRACIÓN", value: "LABOTATORIOS FACULTAD DE ADMINISTRACIÓN"},
        {label: "FACULTAD CIENCIAS DE LA SALUD", value: "FACULTAD CIENCIAS DE LA SALUD"},
        {label: "LABORATORIOS FACULTAD CIENCIAS DE LA SALUD", value: "LABORATORIOS FACULTAD CIENCIAS DE LA SALUD"},
        {label: "LACMA", value: "LACMA"},
        {label: "FACULTAD CIENCIAS SOCIALES", value: "FACULTAD CIENCIAS SOCIALES"},
        {label: "FACULTAD ARQUITECTURA E INGENIERIA", value: "FACULTAD ARQUITECTURA E INGENIERIA"},
        {label: "ADMISIONES, REGISTRO Y CONTROL", value: "ADMISIONES, REGISTRO Y CONTROL"},
        {label: "PERMANENCIA", value: "PERMANENCIA"},
        {label: "VIRTUALIDAD", value: "VIRTUALIDAD"},
        {label: "INTERNACIONALIZACION", value: "INTERNACIONALIZACION"},
        {label: "BIBLIOTECA", value: "BIBLIOTECA"},
        {label: "VICERRECTORIA DE INVESTIGACION Y EXTENSION", value: "VICERRECTORIA DE INVESTIGACION Y EXTENSION"},
        {label: "INVESTIGACION", value: "INVESTIGACION"},
        {label: "DIRECCION DE EXTENSION Y PROYECCION SOCIAL", value: "DIRECCION DE EXTENSION Y PROYECCION SOCIAL"},
        {label: "CENTRO DE LENGUAS", value: "CENTRO DE LENGUAS"},
        {label: "GRADUADOS", value: "GRADUADOS"},
        {label: "EJECUCION DE CONTRATOS Y CONVENIOS", value: "EJECUCION DE CONTRATOS Y CONVENIOS"}
    ],
    categoria: [
        {label: "CONTRATISTA", value: "CONTRATISTA"},
        {label: "INSUMOS", value: "INSUMOS"},
        {label: "SOPORTE", value: "SOPORTE"},
        {label: "MANTENIMIENTO", value: "MANTENIMIENTO"},
        {label: "CALIBRACIONES", value: "CALIBRACIONES"},
        {label: "INSTALACIONES Y REPARACIONES", value: "INSTALACIONES Y REPARACIONES"},
        {label: "MOVILIDAD ACADEMICA", value: "MOVILIDAD ACADEMICA"},
        {label: "PRACTICANTE", value: "PRACTICANTE"},
        {label: "SUBVENCION", value: "SUBVENCION"},
        {label: "EQUIPOS E INTRUMENTOS", value: "EQUIPOS E INTRUMENTOS"},
        {label: "MOBILIARIO", value: "MOBILIARIO"},
        {label: "BASES DE DATOS", value: "BASES DE DATOS"},
        {label: "LICENCIAS Y MEMBRESIAS", value: "LICENCIAS Y MEMBRESIAS"},
        {label: "SOFTWARE", value: "SOFTWARE"},
        {label: "SEGUROS Y POLIZAS", value: "SEGUROS Y POLIZAS"},
        {label: "SERVICIOS PUBLICOS", value: "SERVICIOS PUBLICOS"},
        {label: "TELEFONIACELULAR E INTERNET", value: "TELEFONIACELULAR E INTERNET"},
        {label: "CUOTA DE FISCALIZACION", value: "CUOTA DE FISCALIZACION"},
        {label: "SUMINISTRO DE COMIDAD Y REFRIGERIOS", value: "SUMINISTRO DE COMIDAD Y REFRIGERIOS"},
        {label: "GASTOS LEGALES", value: "GASTOS LEGALES"},
        {label: "GASTOS DE VIAJE-TRASNPORTE", value: "GASTOS DE VIAJE-TRASNPORTE"},
        {label: "GASTOS DE VIAJE-ALIMENTACION", value: "GASTOS DE VIAJE-ALIMENTACION"},
        {label: "GASTOS DE VIAJE-HOSPEDAJE", value: "GASTOS DE VIAJE-HOSPEDAJE"},
        {label: "CAJA MENOR", value: "CAJA MENOR"},
        {label: "SEGURIDAD ALIMENTARIA", value: "SEGURIDAD ALIMENTARIA"},
        {label: "INSCRIPCIONES,AFILIACIONES Y RENOVACIONES", value: "INSCRIPCIONES,AFILIACIONES Y RENOVACIONES"},
        {label: "EVENTOS", value: "EVENTOS"},
        {label: "SERVICIOS DE AUDITORIA Y ACREDITACION", value: "SERVICIOS DE AUDITORIA Y ACREDITACION"},
        {label: "SOUVENIRS", value: "SOUVENIRS"},
        {
            label: "PLAN DE COMUNICACIÓN Y MERCADO Y PLAN DE MEDIOS",
            value: "PLAN DE COMUNICACIÓN Y MERCADO Y PLAN DE MEDIOS"
        },
        {
            label: "PLATAFORMA DE ENVÍO MASIVO DE CORREOS, SMS, IVR Y RECOLECCIÓN DE LEADS E INTERESADOS",
            value: "PLATAFORMA DE ENVÍO MASIVO DE CORREOS, SMS, IVR Y RECOLECCIÓN DE LEADS E INTERESADOS"
        },
        {label: "ARL", value: "ARL"},
        {label: "VIATICOS", value: "VIATICOS"},
        {label: "SERVICIO DE MENSAJERIA", value: "SERVICIO DE MENSAJERIA"},
        {label: "SERVICIO DE IMPRESORAS Y DE FOTOCOPIAS", value: "SERVICIO DE IMPRESORAS Y DE FOTOCOPIAS"},
        {label: "AREA PROTEGIDA", value: "AREA PROTEGIDA"},
        {label: "EXEMENES MEDICOS", value: "EXEMENES MEDICOS"},
        {label: "ESTIMULOS DOCENTES", value: "ESTIMULOS DOCENTES"},
        {label: "EDICTOS", value: "EDICTOS"},
        {label: "PLAN DE CAPACITACION", value: "PLAN DE CAPACITACION"},
        {label: "GMF", value: "GMF"},
        {label: "PUBLICACIONES Y PROCESOS EDITORIALES", value: "PUBLICACIONES Y PROCESOS EDITORIALES"},
        {label: "PATENTES", value: "PATENTES"},
        {label: "REGIONALIZACION-HOSPEDAJE", value: "REGIONALIZACION-HOSPEDAJE"},
        {label: "REGIONALIZACION-ALIMENTACION", value: "REGIONALIZACION-ALIMENTACION"},
        {label: "REGIONALIZACION-TRANSPORTE", value: "REGIONALIZACION-TRANSPORTE"}
    ],
    vigencias_anteriores:[
        {
            'label': "Si",
            'value': "Si"
        },
        {
            'value': "No",
            'label': "No",
        }
    ],

    //resumen final

    ArrayNecesidad:[],
    ArrayValorTotal:[],
    ConteoCosas:1,
    total_todo:0,
    DataRecuperada:false,


    //Way to present info
    classOfTxtAreas:"min-w-[1000px] max-h-[110px]",
});

function esLocalhost() {
    var hostname = window.location.hostname;
    return hostname === 'localhost' || hostname === '127.0.0.1';
}
if(esLocalhost()){
    data.classOfTxtAreas = "min-w-[100px] max-h-[110px]";
}

const create = (enviado) => {
    form.enviado = enviado
    if(data.DataRecuperada && enviado){
        form.enviado = 2
    }
    form.valor_total_de_la_solicitud_actual = data.total_todo
    if(data.ConteoCosas > 0 && form.valor_total_de_la_solicitud_actual > 0){

        form.post(route('formulario.store'), {
            preserveScroll: true,
            forceFormData: true,
            onSuccess: () => {
                // emit("close")
                form.reset()
            },
            onError: () => alert(JSON.stringify(form.errors)),
            onFinish: () => null,
        })
    }else{
        data.MensajeError = 'Hay un error inesperado'
        alert(
            data.ConteoCosas + ' necesidades para un total de: ' + form.valor_total_de_la_solicitud_actual
        );
    }
}

// <!--<editor-fold desc="no important functions">-->
const onContent = () => {
    data.showContent = true
}
const offContent = () => {
    data.showContent = false
}
// <!--</editor-fold>-->

function RecuperarInfoGuardada(Formulario) {
    data.DataRecuperada = true
    form.proceso_que_solicita_presupuesto = Formulario[0].proceso_que_solicita_presupuesto
    // form.enviado = 0
    form.valor_total_de_la_solicitud_actual = Formulario[0].valor_total_de_la_solicitud_actual
    data.ConteoCosas = Formulario.length
    Formulario.forEach((element,index) => {
        form.necesidad[index] = element.necesidad
        form.justificacion[index] = element.justificacion
        form.actividad[index] = element.actividad
        form.categoria[index] = element.categoria
        form.unidad_de_medida[index] = element.unidad_de_medida
        form.cantidad[index] = element.cantidad
        form.valor_unitario[index] = element.valor_unitario
        form.valor_total_solicitatdo_por_necesidad[index] = element.valor_total_solicitatdo_por_necesidad
        form.periodo_de_inicio_de_ejecucion[index] = element.periodo_de_inicio_de_ejecucion
        form.vigencias_anteriores[index] = element.vigencias_anteriores
        form.valor_asignado_en_la_vigencia_anterior[index] = element.valor_asignado_en_la_vigencia_anterior
        form.procesos_involucrados[index] = element.procesos_involucrados
        form.plan_de_mejoramiento_al_que_apunta_la_necesidad[index] = element.plan_de_mejoramiento_al_que_apunta_la_necesidad
        form.linea_del_plan_desarrollo_al_que_apunta_la_necesidad[index] = element.linea_del_plan_desarrollo_al_que_apunta_la_necesidad
        form.frecuencia_de_uso[index] = element.frecuencia_de_uso
        form.mantenimientos_requeridos[index] = element.mantenimientos_requeridos
        form.capacidad_instalada[index] = element.capacidad_instalada
        form.riesgo_de_la_inversion[index] = element.riesgo_de_la_inversion
    });

    onContent(); //emitir mensaje y mostrar demas del form
}

watchEffect(() => {

    // console.log(form.identificacion_user.length)
    if(!data.identificacion_disbled){
        if(form.identificacion_user > 1000){
            if(buscarEnProps(form.identificacion_user, props.cedLideres)){
                data.nombreLider = props.cedLideres[form.identificacion_user]
                if(data.nombreLider){
                    onContent(); //emitir mensaje y mostrar demas del form
                    data.identificacion_disbled = true
                    data.colorDisabled = 'bg-zinc-400 text-white'
                }else{
                    offContent();
                }
            }else{
                if (buscarEnProps(form.identificacion_user, props.cedLideresGuardados)) {
                    // console.log(props.cedLideresGuardados,form.identificacion_user)
                    RecuperarInfoGuardada(props.cedLideresGuardados[form.identificacion_user]['Formulario'])
                }else{
                    if (buscarEnProps(form.identificacion_user, props.cedLideresDiligenciados)) {
                        Alert('Ya se ha diligenciado, lo esperamos el proximo semestre!')
                    }else{
                        offContent();
                    }
                }
            }
        }
    }

    if(form.cantidad && form.valor_unitario && form.cantidad.length > 0 && form.valor_unitario.length > 0){
        data.total_todo = 0
        form.cantidad.forEach(function (canti,index) {
            try{
                let INTvalunitario = parseInt(form.valor_unitario[index])
                let INTcanti = parseInt(canti)
                if(!isNaN(INTcanti) && !isNaN(INTvalunitario)){
                    form.valor_total_solicitatdo_por_necesidad[index] = INTvalunitario * INTcanti
                }else{
                    form.valor_total_solicitatdo_por_necesidad[index] = 0
                }
            }catch(exceptionVar){
                form.valor_total_solicitatdo_por_necesidad[index] = 0
            }finally{
                data.total_todo += form.valor_total_solicitatdo_por_necesidad[index]
            }
        });
    }
})

function buscarPorCedula(cedulaBuscada){
    for (let cedula in props.cedLideres){
        cedula = parseInt(cedula)
        if(cedula === cedulaBuscada){
            return true;
        }
    }
    return false;
}

function buscarEnProps(cedulaBuscada,elprops){
    for (let cedula in elprops){
        cedula = parseInt(cedula)
        if(cedula === cedulaBuscada){
            return true;
        }
    }
    return false;
}
</script>

<template>

    <Head :title="lang().label.welcome" />
    <Toast :flash="$page.props.flash" class=""/>

    <div class="relative flex justify-center min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 items-center sm:pt-0">
        <section class="items-center w-full m-10 lg:mx-20 xl:mx-40 sm:px-6 lg:px-8 2xl:px-auto">
            <article class="flex pt-8 px-4 sm:px-0 sm:pt-0">
                <div class="flex mx-auto text-center items-center">
                    <ApplicationLogo class="h-14 w-auto text-primary fill-current" />
                    <p class="text-3xl 2xl:text-4xl sm:text-3xl mx-auto text-primary">Necesidades economicas anuales por dependencia
                        {{ anioActual }}</p>
                </div>
                <div class="flex items-center">
                    <!-- <SwitchLangNavbar /> -->
                    <SwitchDarkMode />
                </div>
            </article>

            <!-- component -->
            <form v-if="!TodosDiligenciados" @submit.prevent="create" method="POST" enctype="multipart/form-data"
                  class="py-4">
                <div class="mx-auto container max-w-[2100px] shadow-md">
                    <div class="bg-gray-100 dark:bg-gray-600 p-1 border-t-2 bg-opacity-25 border-gray-700 dark:border-gray-300 rounded-t">
<!--                        <div class="max-w-sm mx-auto md:w-full md:mx-0">-->
<!--                            <div class="inline-flex items-center space-x-4">-->
<!--                                <img class="w-10 h-10 object-cover rounded-md" alt="User avatar" src="https://avatars3.githubusercontent.com/u/72724639?s=400&u=964a4803693899ad66a9229db55953a3dbaad5c6&v=4"/>-->
<!--                                <h1 class="text-gray-600 dark:text-white"></h1>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <section class="bg-white dark:bg-gray-800 space-y-6">
                        <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                            <h2 class="md:w-1/2 max-w-sm mx-auto dark:text-gray-100 2xl:text-xl">Por favor, digite el numero de documento para empezar:</h2>
                            <div class="md:w-1/2 max-w-sm mx-auto">
                                <label class="text-sm text-gray-400"></label>
                                <div class="w-full inline-flex my-6">
                                    <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                                        <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                    <input v-model="form.identificacion_user" type="number" min="0" max="99999999999"
                                        :disabled="data.identificacion_disbled"
                                           :class="data.colorDisabled"
                                        class=" w-11/12 focus:text-gray-600 p-2 dark:bg-gray-700 border-0
                                         focus:border-blue-400 placeholder-gray-500 text-gray-700 focus:placeholder-gray-400 dark:focus:placeholder-gray-100
                                         focus:bg-blue-50 focus:shadow-outline bg-gray-200"
                                        placeholder="Escriba aqui su identificacion"
                                    />
                                   <InputError class="mt-2" :message="form.errors.identificacion_user" />
                                </div>
                                <div v-if="form.identificacion_user > 1000" class="w-full inline-flex my-6">
                                    <div class="pt-2 w-1/2 bg-gray-100 bg-opacity-50">
<!--                                        <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>-->
                                        ¿Cuantas Necesidades?
                                    </div>
                                    <input v-model="data.ConteoCosas" type="number" min="0" max="100"
                                            class=" w-1/2 focus:text-gray-600 p-2 dark:bg-gray-700 border-0
                                         focus:border-blue-400 placeholder-gray-500 text-gray-700 focus:placeholder-gray-400 dark:focus:placeholder-gray-100
                                         focus:bg-blue-50 focus:shadow-outline bg-gray-200"
                                        placeholder="Escriba aqui su identificacion"
                                    />
                                   <InputError class="mt-2" :message="form.errors.identificacion_user" />
                                </div>
                                <div v-if="form.identificacion_user > 1000" class="w-full inline-flex">
                                    Proceso que solicita el Presupuesto
                                    <SelectInput v-model="form.proceso_que_solicita_presupuesto"
                                                 :dataSet="data.proceso_que_solicita_presupuesto"
                                                 class="w-full mx-1 bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500"
                                                 autocomplete="off"/>
                                    <InputError class="mt-2" :message="form.errors.proceso_que_solicita_presupuesto"/>
                                </div>
                            </div>
                        </div>


                        <div class="mx-auto text-center">
                            <div v-for="(value,index) in data.nombreLider" :key="index"
                                 class="my-auto mb-4 md:inline-flex max-w-md w-full space-y-2 py-4 px-8 text-gray-500 items-center">
                                <h2 v-if="index === 'name'" class="max-w-md mx-auto uppercase font-bold">Nombre del lider</h2>
                                <h2 v-else class="w-1/4 max-w-md mx-auto uppercase font-bold">{{ index }}</h2>
                                <div class="w-1/2 md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">
                                    <div class="w-full inline-flex border-sky-600 border-b-2">
                                        <label> {{ value }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4"/>
                        <transition v-for="(indexFila,conteoi) in data.ConteoCosas" v-if="data.showContent" name="fade">
                            <div>
                                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
<!--                                    <h2 class="md:w-1/5 mx-auto max-w-sm">Informacion financiera</h2>-->
                                    <div class="flex gap-8 w-full mx-auto overflow-x-scroll min-h-[158px]">
            <!--                            elin-->
                                            <div :class="data.classOfTxtAreas">
                                                <label class="text-sm text-gray-400 capitalize">necesidad</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <textarea cols="100" rows="3"  v-model="form.necesidad[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                </div>
                                                <InputError class="mt-2" :message="form.errors.necesidad" />
                                            </div>
                                            <div :class="data.classOfTxtAreas">
                                                <label class="text-sm text-gray-400 capitalize">justificacion</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <textarea cols="100" rows="3"  v-model="form.justificacion[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.justificacion" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">actividad</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input v-model="form.actividad[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.actividad" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">categoria</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput v-model="form.categoria[conteoi]" :dataSet="data.categoria"
                                                                 class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.categoria" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">unidad de medida</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput v-model="form.unidad_de_medida[conteoi]"
                                                                 :dataSet="props.losSelect.unidad_de_medida" class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.unidad_de_medida" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">cantidad</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input v-model="form.cantidad[conteoi]"
                                                           type="number"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.cantidad" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">valor unitario</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input v-model="form.valor_unitario[conteoi]" type="number" min="0"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.valor_unitario" />
                                                </div>
                                            </div>
                                            <div class="min-w-[230px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">valor total</label>
                                                <label class="text-xs text-gray-400"> (solicitado por necesidad)</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input disabled v-model="form.valor_total_solicitatdo_por_necesidad[conteoi]"  class="w-full bg-zinc-400 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.valor_total_solicitatdo_por_necesidad" />
                                                </div>
                                            </div>







                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">periodo de inicio de ejecucion</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput :dataSet="props.losSelect.periodo_de_inicio_de_ejecucion" v-model="form.periodo_de_inicio_de_ejecucion[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.periodo_de_inicio_de_ejecucion" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">vigencias anteriores</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput :dataSet="data.vigencias_anteriores" v-model="form.vigencias_anteriores[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.vigencias_anteriores" />
                                                </div>
                                            </div>
                                            <div class="min-w-[250px] max-h-[110px]">
                                                <label class="text-sm text-gray-400">Valor asignado en la vigencia anterior</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input v-model="form.valor_asignado_en_la_vigencia_anterior[conteoi]" type="number" min="0"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.valor_asignado_en_la_vigencia_anterior" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">procesos involucrados</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input v-model="form.procesos_involucrados[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.procesos_involucrados" />
                                                </div>
                                            </div>
                                            <div class="min-w-[310px] max-h-[110px]">
                                                <label class="text-sm text-gray-400">Plan de mejoramiento al que apunta la necesidad</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input v-model="form.plan_de_mejoramiento_al_que_apunta_la_necesidad[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.plan_de_mejoramiento_al_que_apunta_la_necesidad" />
                                                </div>
                                            </div>
                                            <div class="min-w-[360px] max-h-[110px]">
                                                <label class="text-sm text-gray-400">Linea del plan desarrollo al que apunta la necesidad</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <input v-model="form.linea_del_plan_desarrollo_al_que_apunta_la_necesidad[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.linea_del_plan_desarrollo_al_que_apunta_la_necesidad" />
                                                </div>
                                            </div>
                                            <div class="min-w-[300px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">frecuencia de uso</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput :dataSet="props.losSelect.frecuencia_de_uso" v-model="form.frecuencia_de_uso[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.frecuencia_de_uso" />
                                                </div>
                                            </div>
                                            <div class="min-w-[300px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">mantenimientos requeridos</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput :dataSet="props.losSelect.mantenimientos_requeridos" v-model="form.mantenimientos_requeridos[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.mantenimientos_requeridos" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">capacidad instalada</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput :dataSet="props.losSelect.capacidad_instalada" v-model="form.capacidad_instalada[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.capacidad_instalada" />
                                                </div>
                                            </div>
                                            <div class="min-w-[200px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">riesgo de la inversion</label>
                                                <div class="w-full inline-flex">
<!--                                                    <div class="w-1/12 pt-2 bg-white"><svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>-->
                                                    <SelectInput :dataSet="props.losSelect.riesgo_de_la_inversion" v-model="form.riesgo_de_la_inversion[conteoi]" type="text"  class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500" autocomplete="off"/>
                                                    <InputError class="mt-2" :message="form.errors.riesgo_de_la_inversion" />
                                                </div>
                                            </div>
                                            <div class="min-w-[500px] max-h-[110px]">
                                                <label class="text-sm text-gray-400 capitalize">anexos</label>
                                                <div class="w-full flex">
            <!--                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"-->
                                                    <input id="anexos" type="file" @input="form.anexos = $event.target.files[0]"
                                                           @change="handleFile" accept="application/pdf"
                                                           class="w-full bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500"
                                                           autocomplete="off"/>
                                                            <p v-if="form.anexos" class="w-full my-2 text-green-600">
                                                                {{ form.anexos.name }}
                                                            </p>
                                                </div>
                                                <progress v-if="form.progress" :value="form.progress.percentage" max="100"
                                                          class="bg-sky-200">
                                                    {{ form.progress.percentage }}%
                                                </progress>
                                            </div>
                                            <InputError class="mt-2" :message="form.errors.anexos" />
                                        </div>
                                    </div>
                                    <!--   elfin-->

                                <!-- total-->
                            </div>
                        </transition>
                        <section v-if="data.showContent">
                            <div class="px-1 flex py-2 text-gray-500 items-center text-center">
                                <div class="mx-auto relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Necesidad
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subtotal
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody  class="items-center">
                                            <tr v-for="(element, indexNecesidad) in form.necesidad"
                                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <!--                                            <div class="w-full md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">-->
                                                    <td class="w-full text-left">
                                                         {{ element }}
                                                    </td>
    <!--                                            </div>-->
    <!--                                            <div class="w-full md:pl-9 max-w-sm mx-auto space-y-5 pl-2">-->
                                                    <td class="w-full text-right">
                                                        {{ number_format(form.valor_total_solicitatdo_por_necesidad[indexNecesidad], 0, 1) }}
                                                    </td>
    <!--                                            </div>-->
                                            </tr>
                                        </tbody>

<!--                            <div v-for="(element, indexNecesidad) in form.necesidad" class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center">-->
<!--                                <div class="w-full md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">-->
<!--                                    <div class="w-full inline-flex">-->
<!--                                        <label> {{ element }} </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="w-full md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">-->
<!--                                    <div class="w-full inline-flex">-->
<!--                                        <label class="font-bold"> {{ number_format(form.valor_total_solicitatdo_por_necesidad[indexNecesidad],0,1) }} </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                                    </table>
                                </div>
                            </div>
                            <div class="w-full text-center md:pl-9 max-w-sm mx-auto space-y-5 pl-2">
                                <div class="w-full text-center mx-auto">
                                    <label class="text-lg text-center"> Total final:
                                        <small class="font-bold text-xl">{{ number_format(data.total_todo,0,1) }}</small> </label>
                                </div>
                            </div>
                            <hr/>
                        </section>
                        <!-- botones de guardado    -->
                        <div v-if="data.showContent"
                             class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center">
                            <div class="grid grid-cols-2 gap-8 mx-auto text-center md:pl-6">
                                <PrimaryButton
                                    class="text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    @click="create(0)"
                                >
                                    <svg fill="none" class="w-4 text-white mr-2" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    Guardar y no enviar
                                </PrimaryButton>
                                <PrimaryButton
                                    class="text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    @click="create(1)"
                                >
                                    <svg fill="none" class="w-4 text-white mr-2" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    Enviar
                                </PrimaryButton>
                            </div>
                        </div>
                    </section>
                </div>
            </form>

            <div class="sm:flex justify-between mt-4 text-sm text-gray-500">
                <div class="flex mx-4 sm:mx-0 flex-row justify-center text-center">
                    <p><a href="https://brive.erikwibowo.com" target="_blank">{{ $page.props.app.name }}</a> ©️</p>
                </div>
            </div>
        </section>
    </div>
</template>
<style>
::-webkit-scrollbar {
    height: 6px; /* Altura del scrollbar vertical */
    width: 3px; /* Ancho del scrollbar horizontal */
}
/* Estilo del thumb del scrollbar */
::-webkit-scrollbar-thumb {
    background-color: #00004f; /* Color del thumb */
    border-radius: 1px; /* Radio de borde del thumb */
}

</style>
