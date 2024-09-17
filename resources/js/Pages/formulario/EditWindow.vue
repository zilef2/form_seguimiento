<script setup>
import Breadcrumb from '@/Components/Breadcrumb.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import TextAreaZilef from "@/Pages/formulario/TextAreaZilef.vue";
import SelectInput from "@/Components/SelectInput.vue";
import InputError from "@/Components/InputError.vue";
import vselect from "vue-select";
import "vue-select/dist/vue-select.css";
import TextInput from "@/Components/TextInput.vue";
import {RestoreFormOnEdit, handledinero, handleCantidad, calcularTotal, handledinerVigAnt} from "@/Pages/CreateFormFunctions";
import {reactive, ref, watch, onMounted, watchEffect} from "vue";
import SimpleToast from "@/Components/SimpleToast.vue";


// roles: Number,
const props = defineProps({
    elform: Object,
    breadcrumbs: Object,
    title: String,
    numberPermissions: Number,
    losSelect: Object,
})
const data = reactive({
    valor_total_solicitatdo_por_necesidad: 0,

})
const form = useForm({
    Nombre: '',
    identificacion_user: '',
    // proceso_que_solicita_presupuesto: '',
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
    enviado: 0,
    valor_total_de_la_solicitud_actual: 0,

});

onMounted(() => {
    form.reset()

    if (props.numberPermissions > 9000) {
    }

    RestoreFormOnEdit(form, props)

})

// watch(() => form.cantidad, (newVal) => {
//     form.cantidad = handleCantidad(newVal)
// });

watchEffect(() => {
    console.log("=>(EditWindow.vue:88) form.vigencias_anteriores.value", form.vigencias_anteriores);
    if (form.vigencias_anteriores.value === 'No') form.valor_asignado_en_la_vigencia_anterior = 0

    form.valor_total_solicitatdo_por_necesidad = calcularTotal(form.valor_unitario, form.cantidad, data)
})


const validaciones = () => {
}

const update = () => {
    //todo: validar que el total sea numero
    form.valor_unitario = parseInt(form.valor_unitario.toString().replace(/\$|\./g, ''))
    form.valor_asignado_en_la_vigencia_anterior = parseInt(form.valor_asignado_en_la_vigencia_anterior.toString().replace(/\$|\./g, ''))

    if (form.vigencias_anteriores.value === 'No') form.valor_asignado_en_la_vigencia_anterior = 0
    form.put(route('formu.update', props.elform.id), {
        preserveScroll: false,
        forceFormData: false,
        onSuccess: () => null,
        // onSuccess: () => form.reset(),
        onError: () => null,
        // onError: () => alert('¡Hay campos faltantes!'),
        onFinish: () => null,
    })
}
</script>

<template>
    <Head title="Dashboard"/>
    <AuthenticatedLayout>
        <SimpleToast :flash="$page.props.flash"/>
        <Breadcrumb :title="title" :breadcrumbs="breadcrumbs"/>
        <div class="absolute top-56 left-1/2">
            py-2 md:py-12 lg:py-6 4xl:py-20
        </div>
        <div class="bg-gray-100 dark:bg-gray-900 -mt-80">
            <div class="flex-wrap mx-auto px-1 sm:px-6 lg:px-8 gap-8">
                <div class="max-w-xl md:max-w-[1200px] mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 md:p-10 lg:p-12">
                    <h1 class="text-2xl text-[#499884] dark:text-gray-100 mb-6">Necesidades económicas anuales de <span
                        class="font-bold">{{ props.elform.proceso_que_solicita_presupuesto }}</span></h1>
                    <!--                    <p class="text-gray-600 dark:text-gray-400 mb-8">-->
                    <!--                        El siguiente formulario tiene-->
                    <!--                    </p>-->
                    <form @submit.prevent="update" method="POST" class="space-y-6 grid grid-cols-2 xl:grid-cols-4 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nombre
                            </label>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                La necesidad tiene un nombre o un pseudonimo?
                            </label>
                            <TextInput v-model="form.Nombre" type="text"
                                       class="block w-full rounded-lg" placeholder="Nombre"/>
                            <InputError class="mt-2" :message="form.errors.proceso_que_solicita_presupuesto"/>
                        </div>
                        <!--                        <div class="col-span-2">-->
                        <!--                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">-->
                        <!--                                Proceso que solicita presupuesto-->
                        <!--                            </label>-->
                        <!--                            <SelectInput v-model="form.proceso_que_solicita_presupuesto"-->
                        <!--                                         :dataSet="props.losSelect.proceso_que_solicita_presupuesto"-->
                        <!--                                         class="w-full mx-1 bg-zinc-200 text-black dark:text-white font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500"-->
                        <!--                                         autocomplete="off" placeholder="Especifique"/>-->
                        <!--                            <InputError class="mt-2" :message="form.errors.proceso_que_solicita_presupuesto"/>-->
                        <!--                        </div>-->
                        <div class="col-span-2">
                            <TextAreaZilef v-model:valor="form.necesidad" placeholder="Describa aqui su " nombre="necesidad"/>
                            <InputError class="mt-2" :message="form.errors.necesidad"/>
                        </div>
                        <div class="col-span-2">
                            <TextAreaZilef v-model:valor="form.justificacion" placeholder="Describa aqui su " nombre="justificacion"/>
                            <InputError class="mt-2" :message="form.errors.justificacion"/>
                        </div>
                        <div class="col-span-2">
                            <TextAreaZilef v-model:valor="form.actividad" placeholder="Describa aqui su " nombre="actividad"/>
                            <InputError class="mt-2" :message="form.errors.actividad"/>
                        </div>

                        <div class="col-span-2">
                            <label name="labelcategoria"> Categoria </label>
                            <vselect
                                :options="props.losSelect.categorias"
                                v-model="form.categoria"
                                label="name"></vselect>
                            <InputError class="mt-2" :message="form.errors.categoria"/>
                        </div>
                        <div class="col-span-2">
                            <label name="unidad_de_medida"> Unidad de medida </label>
                            <vselect
                                :options="props.losSelect.unidad_de_medida"
                                v-model="form.unidad_de_medida"
                                label="label"></vselect>
                            <InputError class="mt-2" :message="form.errors.unidad_de_medida"/>
                        </div>
                        <div class="col-span-1">
                            <label class="block mt-9 text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 capitalize">
                                Cantidad
                            </label>
                            <!--                                       @input="handledinero(form)"-->
                            <TextInput
                                name="cantidad"
                                class="block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                :placeholder="'cantidad'"
                                @input="handleCantidad(form)"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                v-model="form.cantidad"
                            />
                        </div>
                        <div class="col-span-1">
                            <label class="block mt-9 text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 capitalize">
                                Valor unitario
                            </label>
                            <TextInput
                                name="valor_unitario"
                                class="block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="valor unitario"
                                @input="handledinero(form)"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                v-model="form.valor_unitario"
                            />
                        </div>

                        <div class="col-span-2 p-4">
                            <label class="text-md text-gray-900 font-bold capitalize">Valor total</label>
                            <p class="text-md text-gray-700">Valor generado automáticamente</p>
                            <div class="w-full inline-flex">
                                <!--                                    @blur="metodoConThrottle"-->
                                <input
                                    disabled @keydown.enter.prevent="update"
                                    v-model="data.valor_total_solicitatdo_por_necesidad"
                                    class="w-full bg-zinc-400 text-black dark:text-white dark:bg-black font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500"
                                    autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label name="periodo_de_inicio_de_ejecucion"> Periodo de inicio de ejecucion </label>
                            <vselect
                                :options="props.losSelect.periodo_de_inicio_de_ejecucion"
                                v-model="form.periodo_de_inicio_de_ejecucion"
                                label="label"></vselect>
                            <InputError class="mt-2" :message="form.errors.periodo_de_inicio_de_ejecucion"/>
                        </div>
                        <div class="mt-12 col-span-1 xl:col-span-2 xl:col-start-1">
                            <label name="vigencias_anteriores" class="">Vigencias anteriores</label>
                            <vselect
                                :options="[{value:'Si',label:'Si'},{value:'No',label:'No'}]"
                                v-model="form.vigencias_anteriores"
                                label="label" class=""></vselect>
                            <InputError class="mt-2" :message="form.errors.vigencias_anteriores"/>
                        </div>
                        <div v-show="form.vigencias_anteriores && form.vigencias_anteriores.value != 'No'" class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 capitalize">
                                valor asignado en la vigencia anterior
                            </label>
                            <TextInput
                                name="valor_asignado_en_la_vigencia_anterior"
                                class="block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="valor unitario"
                                @input="handledinerVigAnt(form)"

                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                v-model="form.valor_asignado_en_la_vigencia_anterior"
                            />
                            <InputError class="mt-2" :message="form.errors.valor_asignado_en_la_vigencia_anterior"/>
                        </div>

                        <div class="col-span-full">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Procesos articulados <span class="text-amber-600 font-bold">(Multiple)</span>
                            </label>
                            
                            <vselect
                                :options="props.losSelect.procesos_involucrados"
                                v-model="form.procesos_involucrados"
                                label="label"
                                class=""
                                multiple>
                                
                            </vselect>
                        </div>
                        
                        <div class="col-span-full">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Plan de Mejoramiento y Mantenimiento (PMM) al que apunta la necesidad <span class="text-amber-600 font-bold">(Multiple)</span>
                            </label>
                            <vselect
                                :options="props.losSelect.plan_de_mejoramiento_al_que_apunta_la_necesidad"
                                v-model="form.plan_de_mejoramiento_al_que_apunta_la_necesidad"
                                label="label"
                                multiple></vselect>
                        </div>
                        <div class="col-span-full">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Líneas del Plan de Desarrollo Institucional 2024-2028 al que apunta la
                                necesidad
                                <span class="text-amber-600 font-bold">(Multiple)</span>
                            </label>
                            <vselect :options="props.losSelect.linea_del_plan_desarrollo_al_que_apunta_la_necesidad"
                                v-model="form.linea_del_plan_desarrollo_al_que_apunta_la_necesidad"
                                label="label"
                                multiple></vselect>
                        </div>

                        <div class="col-span-full">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Frecuencia de uso</label>
                            <vselect
                                :options="props.losSelect.frecuencia_de_uso"
                                v-model="form.frecuencia_de_uso"
                                label="label"></vselect>
                        </div>
                        <div class="col-span-full">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Mantenimientos Requeridos</label>
                            <vselect
                                :options="props.losSelect.mantenimientos_requeridos"
                                v-model="form.mantenimientos_requeridos"
                                label="label"></vselect>
                        </div>
                        <div class="col-span-full">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Capacidad Instalada
                                <span @prevent="create" @click="VolverNo">⏪</span>
                            </label>
                            <vselect
                                v-if="data.Otras_capacidad_instalada"
                                :options="props.losSelect.capacidad_instalada"
                                v-model="form.capacidad_instalada"
                                label="label"></vselect>

                            <div v-else class="w-full inline-flex">
                            <textarea cols="100" rows="7"
                                v-model="form.capacidad_instalada"
                                type="text"
                                @keydown.enter.prevent="create"
                                class="w-full bg-zinc-200 text-black dark:text-white dark:bg-black font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500"
                                autocomplete="off"
                            />
                            </div>
                            <InputError class="mt-2" :message="form.errors.capacidad_instalada"/>
                        </div>
                        <div class="col-span-2">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Riesgos <span class="text-amber-600 font-bold">(Multiple)</span></label>
                            <vselect
                                :options="props.losSelect.riesgo_de_la_inversion"
                                v-model="form.riesgo_de_la_inversion"
                                label="label"
                                multiple>
                            </vselect>
                        </div>

                        <div v-if="Object.keys(form.errors).length > 0" class="col-span-full">
                            <ul>
                                <li v-for="(errorMessages, field) in form.errors" :key="field">
                                    <strong>{{ field.replace(/_/g, ' ') }}:</strong>
                                    <ul>
                                        {{ errorMessages }}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-full">
                            <button type="submit"
                                    class="w-full inline-flex justify-center py-2 px-4
                                    border border-indigo-700 shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 
                                    hover:bg-white hover:text-black duration-[1s]
                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Terminar la edición
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
