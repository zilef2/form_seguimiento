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

    if(props.numberPermissions > 9000) {}

    RestoreFormOnEdit(form,props)

})

// watch(() => form.cantidad, (newVal) => {
//     form.cantidad = handleCantidad(newVal)
// });

watchEffect(() => {
    console.log("=>(EditWindow.vue:88) form.vigencias_anteriores.value", form.vigencias_anteriores);
    if (form.vigencias_anteriores.value === 'No') form.valor_asignado_en_la_vigencia_anterior = 0

    form.valor_total_solicitatdo_por_necesidad = calcularTotal(form.valor_unitario, form.cantidad, data)
})


const validaciones = () => {}

const update = () => {
    //todo: validar que el total sea numero
    form.valor_unitario = parseInt(form.valor_unitario.toString().replace(/\$|\./g, ''))
    form.valor_asignado_en_la_vigencia_anterior = parseInt(form.valor_asignado_en_la_vigencia_anterior.toString().replace(/\$|\./g, ''))
    console.log("=>(updateWindow.vue:51) form.valor_unitario", form.valor_unitario);

    if (form.vigencias_anteriores.value === 'No') form.valor_asignado_en_la_vigencia_anterior = 0
    form.put(route('formu.update'), {
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
        </div>
<!--        py-2 md:py-12 lg:py-6 4xl:py-20-->
        <div class="bg-gray-100 dark:bg-gray-900 py-2 md:py-12 lg:py-6 4xl:py-20">
            <div class="flex-wrap mx-auto px-1 sm:px-6 lg:px-8 gap-8">
                <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 md:p-10 lg:p-12">
                    <h1 class="text-2xl text-[#499884] dark:text-gray-100 mb-6">Necesidades económicas anuales de <span class="font-bold">{{props.elform.proceso_que_solicita_presupuesto}}</span></h1>
<!--                    <p class="text-gray-600 dark:text-gray-400 mb-8">-->
<!--                        El siguiente formulario tiene-->
<!--                    </p>-->
                    <form @submit.prevent="update" method="POST" class="space-y-6 grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nombre
                            </label>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                La necesidad tiene un nombre o un pseudonimo?
                            </label>
                            <TextInput v-model="form.Nombre" type="text"
                                       class="block w-full rounded-lg" placeholder="Nombre"/>
                            <InputError class="mt-2" :message="form.errors.Nombre"/>
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
                            <label name="unidad_de_medida"> unidad de medida </label>
                            <vselect
                                :options="props.losSelect.unidad_de_medida"
                                v-model="form.unidad_de_medida"
                                label="label"></vselect>
                            <InputError class="mt-2" :message="form.errors.unidad_de_medida"/>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 capitalize">
                                cantidad
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
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 capitalize">
                                valor unitario
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

                        <div class="col-span-full p-4">
                            <label class="text-md text-gray-900 font-bold capitalize">valor total</label>
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
                            <label name="periodo_de_inicio_de_ejecucion"> periodo de inicio de ejecucion </label>
                            <vselect
                                :options="props.losSelect.periodo_de_inicio_de_ejecucion"
                                v-model="form.periodo_de_inicio_de_ejecucion"
                                label="label"></vselect>
                            <InputError class="mt-2" :message="form.errors.periodo_de_inicio_de_ejecucion"/>
                        </div>
                        <div class="">
                            <label name="vigencias_anteriores"> vigencias anteriores</label>
                            <vselect
                                :options="[{value:'Si',label:'Si'},{value:'No',label:'No'}]"
                                v-model="form.vigencias_anteriores"
                                label="label"></vselect>
                            <InputError class="mt-2" :message="form.errors.vigencias_anteriores"/>
                        </div>

                        <div v-show="form.vigencias_anteriores && form.vigencias_anteriores.value != 'No'" class="">
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

                        <!--                        <div class="flex items-center">-->
                        <!--                            <input-->
                        <!--                                id="terms"-->
                        <!--                                name="terms"-->
                        <!--                                type="checkbox"-->
                        <!--                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"-->
                        <!--                            />-->
                        <!--                            <label htmlFor="terms" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">-->
                        <!--                                Acepto los términos y condiciones-->
                        <!--                            </label>-->
                        <!--                        </div>-->

                        <!--                        <div>-->
                        <!--                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tipo de usuario</label>-->
                        <!--                            <div class="flex items-center">-->
                        <!--                                <input id="individual" name="user-type" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"/>-->
                        <!--                                <label htmlFor="individual" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">-->
                        <!--                                    Lider de Area-->
                        <!--                                </label>-->
                        <!--                            </div>
                                                     </div>-->

                        <div v-if="Object.keys(form.errors).length > 0" class="col-span-full">
                            <ul>
                                <li v-for="(errorMessages, field) in form.errors" :key="field">
                                    <strong>{{ field.replace(/_/g, ' ') }}:</strong>
                                    <ul>
                                        <!--                                        <li v-for="(message, index) in errorMessages" :key="index">-->
                                        {{ errorMessages }}
                                        <!--                                        </li>-->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-full">
                            <button type="submit"
                                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Siguiente
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
