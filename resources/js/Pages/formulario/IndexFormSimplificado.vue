<script setup>
// const form = useForm({ })
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import {reactive, watch, ref, watchEffect, onMounted, onBeforeUnmount, computed} from 'vue';
import DangerButton from '@/Components/DangerButton.vue';
import pkg from 'lodash';
import {router, usePage, Link, useForm} from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import {Squares2X2Icon, ChevronUpDownIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/solid';
import Create from '@/Pages/formulario/Create.vue';
import Edit from '@/Pages/formulario/Edit.vue';
import Sugerir from '@/Pages/formulario/Sugerir.vue';
import Delete from '@/Pages/formulario/Delete.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InfoButton from '@/Components/InfoButton.vue';
import {PrimerasPalabras, vectorSelect, formatDate, CalcularAvg, number_format, plata_format} from '@/global.ts';
import RadioButton from "@/Components/RadioButton.vue";

const {_, debounce, pickBy} = pkg
const props = defineProps({
    numberPermissions: Number,
    fromController: Object,
    total: Number,
    filters: Object,
    breadcrumbs: Object,
    perPage: Number,

    title: String,

    losSelect: Object,
    lider: Object,
    estadosFormulario: Object,
    totalValorUnitario: Number,
})

const data = reactive({
    params: {
        search: props.filters.search,
        searcLider: props.filters.searcLider,
        SoloEnviados: props.filters.SoloEnviados,
        SoloGuardados: props.filters.SoloGuardados,
        Backcat: props.filters.Backcat,
        liderchu: props.filters.liderchu,

        field: props.filters.field,
        order: props.filters.order,
        perPage: props.perPage,
    },
    necesidad: null,
    selectedId: [],
    multipleSelect: false,
    createOpen: false,
    editOpen: false,
    deleteOpen: false,
    // deleteBulkOpen: false,
    dataSet: usePage().props.app.perpage,
    ElCantidadTotal: 0,
    claseSticky: 'sticky',
    hayCongelado: false,
})
onMounted(() => {
    // calcularTotal(props.fromController.data)
});

watchEffect(() => {
//
//     setTimeout((()=> ActivarYDesactivarBooleans()
//     ),500)
//
}, {deep: true})

// <!--<editor-fold desc="order, watchclone, select">-->
const order = (field) => {
    data.params.field = field
    data.params.order = data.params.order === "asc" ? "desc" : "asc"
}

watch(() => _.cloneDeep(data.params), debounce(() => {
    let params = pickBy(data.params)
    router.get(route("formularioSA"), params, {
        replace: true,
        preserveState: true,
        preserveScroll: true,
    })
}, 150))

const selectAll = (event) => {
    if (event.target.checked === false) {
        data.selectedId = []
    } else {
        props.formularios?.data.forEach((formulario) => {
            data.selectedId.push(formulario.id)
        })
    }
}
const select = () => data.multipleSelect = props.fromController?.data.length === data.selectedId.length;

// <!--</editor-fold>-->


// text // number // dinero // date // datetime // foreign
const titulos = [
    {order: 'estado', label: 'estado', type: 'text'},
    {order: 'nombre', label: 'nombre', type: 'text'},
    {order: 'necesidad', label: 'necesidad', type: 'text'},
    {order: 'justificacion', label: 'justificacion', type: 'text'},
    {order: 'actividad', label: 'Actividad', type: 'text'},
    {order: 'cantidad', label: 'Cantidad', type: 'numberWithUM'},
    {order: 'valor_unitario', label: 'Valor unitario', type: 'dinero'},
    {order: 'valor_total_solicitatdo_por_necesidad', label: 'Valor total solicitatdo por necesidad', type: 'dinero'},
    {order: 'periodo_de_inicio_de_ejecucion', label: 'Periodo de inicio de ejecucion', type: 'text'},
    {order: 'vigencias_anteriores', label: 'Vigencias anteriores', type: 'text'},
    {order: 'valor_asignado_en_la_vigencia_anterior', label: 'Valor asignado en la vigencia anterior', type: 'dinero'},

    // { order: 'procesos_involucrados', label: 'Procesos involucrados', type: 'selectsMultiple',newName:'procesos_involucrado'},
    // { order: 'plan_de_mejoramiento_al_que_apunta_la_necesidad', label: 'Plan de mejoramiento al que apunta la necesidad', type: 'selectsMultiple',newName:'plan_de_mejoramiento_al_que_apunta_la_necesida'},
    // { order: 'linea_del_plan_desarrollo_al_que_apunta_la_necesidad', label: 'Linea del plan desarrollo al que apunta la necesidad', type: 'selectsMultiple',newName:'linea_del_plan_desarrollo_al_que_apunta_la_necesida'},

    {order: 'frecuencia_de_uso', label: 'Frecuencia de uso', type: 'text'},
    // { order: 'mantenimientos_requeridos', label: 'Mantenimientos requeridos', type: 'text' },
    // { order: 'capacidad_instalada', label: 'Capacidad instalada', type: 'text' },
    // { order: 'riesgo_de_la_inversion', label: 'Riesgo de la inversion', type: 'text' },
    // { order: 'valor_total_de_la_solicitud_actual', label: 'Valor total de la solicitud actual', type: 'dinero' },
    // { order: 'identificacion_user', label: 'cc', type: 'minitext' },
    // { order: 'enviado', label: 'Enviado', type: 'boolEnviado'},
];

onBeforeUnmount(() => {
});
</script>

<template>
    <Head :title="props.title"/>
    <AuthenticatedLayout>
        <!--        <Breadcrumb :title="title" :breadcrumbs="breadcrumbs" class="capitalize text-xl font-bold"/>-->
        <div class="mx-auto text-center my-4"><p class="text-lg font-bold">{{ lider.name }}</p></div>
        <div class="space-y-1">
            <!--             {{ props.losSelect }} -->
            <div class="px-4 sm:px-0">
                <div class=" rounded-lg overflow-hidden w-fit">
                    v-if="can(['sugerencia user'])"
                    <Sugerir :show="data.editOpen" @close="data.editOpen = false"
                             :necesidad="data.necesidad" :lider="lider"
                             :title="props.title" :titulos="titulos" :losSelect="props.losSelect"
                             :numberPermissions="props.numberPermissions" :estadosFormulario="props.estadosFormulario"/>
                </div>
            </div>
            <div class=" bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div
                    v-sticky="{ zIndex: 100 }"
                    class="flex justify-items-start p-2 gap-6 dark:bg-gray-900/50 text-left top-0 bg-white"
                    :class="data.claseSticky">
                    <!--                    <div class="flex">-->
                    <!--                        <SelectInput v-model="data.params.perPage" :dataSet="data.dataSet" />-->
                    <!--                    </div>-->
                    <TextInput v-if="props.numberPermissions >= 0" v-model="data.params.search" type="text"
                               placeholder="Necesidad o justificacion o nombre"
                               class="block w-1/6 md:w-1/5 rounded-lg"/>

                    <!--                    <div class="grid grid-rows-3 my-auto mx-1 h-12 z-20">-->
                    <!--                            <div>-->
                    <!--                                <input v-model="data.params.SoloEnviados" type="radio" name="booleanFilters" value="Todos" checked/>-->
                    <!--                                <label for="guardados" class="mx-2 text-xs">Todos</label>-->
                    <!--                            </div>-->
                    <!--                            <div>-->
                    <!--                                <input v-model="data.params.SoloEnviados" type="radio" name="booleanFilters" value="guardados"/>-->
                    <!--                                <label for="guardados" class="mx-2 text-xs">Guardados</label>-->
                    <!--                            </div>-->

                    <!--                            <div>-->
                    <!--                                <input v-model="data.params.SoloEnviados" type="radio" name="booleanFilters" value="enviados"/>-->
                    <!--                                <label for="enviados" class="mx-2 text-xs">Enviados</label>-->
                    <!--                            </div>-->
                    <!--                    </div>-->
                </div>
                <div class="overflow-auto scrollbar-table max-h-[70vh]">
                    <table v-if="props.total > 0" class="min-w-full border-collapse overflow-y-scroll max-h-sm ">
                        <caption class="caption-top">
                            <!--                            Tabla 1.0 Necesidades por cedula-->
                        </caption>
                        <thead
                            class="sticky top-0 z-10 bg-white uppercase text-sm border-t border-gray-200 dark:border-gray-700">
                        <tr class="dark:bg-gray-900/50">
                            <!--                                <th class="px-2 py-4 text-center">-->
                            <!--                                    <Checkbox v-model:checked="data.multipleSelect" @change="selectAll" />-->
                            <!--                                </th>-->
                            <th class="px-2 py-4">Accion</th>

                            <!--                                <th class="px-2 py-4 text-center">#</th>-->
                            <th v-for="titulo in titulos" class="px-2 py-4 cursor-pointer text-center w-64"
                                v-on:click="order(titulo['order'])">
                                <div class="items-center text-center">
                                    <span class="text-center underline">{{ titulo['label'] }}</span>
                                    <!--                                        <span>{{ lang().label[titulo['label']] }}</span>-->
                                    <!--                                        <ChevronUpDownIcon class="w-4 h-4" />-->
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(claseFromController, indexu) in props.fromController.data" :key="indexu"
                            class="border-t border-gray-200 dark:border-gray-700 hover:bg-sky-100 hover:dark:bg-gray-900/20 even:bg-gray-300">
                            <td class="whitespace-nowrap py-4 px-2 sm:py-3">
                                <div v-if="!claseFromController.cantidad_sugerida"
                                     class="flex justify-center items-center">
                                    <div class="rounded-md overflow-hidden">
                                        <InfoButton v-show="can(['update user'])" type="button"
                                                    @click="(data.editOpen = true), (data.necesidad = claseFromController)"
                                                    class="px-2 py-1.5 rounded-none" v-tooltip="lang().tooltip.edit">
                                            <Squares2X2Icon class="w-4 h-4"/>
                                        </InfoButton>
                                        <!--                                            <DangerButton v-show="can(['delete user'])" type="button"-->
                                        <!--                                                @click="(data.deleteOpen = true), (data.user = user)"-->
                                        <!--                                                class="px-2 py-1.5 rounded-none" v-tooltip="lang().tooltip.delete">-->
                                        <!--                                                <TrashIcon class="w-4 h-4" />-->
                                        <!--                                            </DangerButton>-->
                                    </div>
                                </div>
                                <div> Ok
                                </div>
                            </td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{
                                    props.estadosFormulario.find(ele => ele.id === claseFromController.estado).nombre
                                }} </span></td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span
                                class="max-w-[220px] min-w-[40px]"> {{ claseFromController.Nombre }} </span></td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span
                                class="max-w-[220px] min-w-[40px]"> {{ claseFromController.necesidad }} </span></td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span
                                class="max-w-[220px] min-w-[40px]"> {{ claseFromController.justificacion }} </span></td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span
                                class="max-w-[220px] min-w-[40px]"> {{ claseFromController.actividad }} </span></td>

                            <td class=" text-center py-4 px-2 sm:py-3 w-64">
                                <div v-if="claseFromController.cantidad_sugerida" class="max-w-[220px] min-w-[40px]">
                                    <b class="line-through">{{ claseFromController.cantidad }}</b>
                                    <p class="text-lg"> {{ claseFromController.cantidad_sugerida }}</p>
                                </div>
                                <span v-else class="max-w-[220px] min-w-[40px]">
                                    {{ claseFromController.valor_unitario }}
                                </span>
                            </td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64">
                                <div v-if="claseFromController.valor_unitario_sugerida"
                                     class="max-w-[220px] min-w-[40px]">
                                    <b class="line-through">{{ claseFromController.valor_unitario }}</b>
                                    <p class="text-lg"> {{ claseFromController.valor_unitario_sugerida }}</p>
                                </div>
                                <span v-else class="max-w-[220px] min-w-[40px]">
                                    {{ claseFromController.valor_unitario }}
                                </span>
                            </td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64">
                                <div v-if="claseFromController.valor_total_solicitatdo_por_necesidad_sugerida"
                                     class="max-w-[220px] min-w-[40px]">
                                    <b class="line-through">{{
                                            claseFromController.valor_total_solicitatdo_por_necesidad
                                        }}</b>
                                    <p class="text-lg">
                                        {{ claseFromController.valor_total_solicitatdo_por_necesidad_sugerida }}</p>
                                </div>
                                <span v-else class="max-w-[220px] min-w-[40px]">
                                    {{ claseFromController.valor_total_solicitatdo_por_necesidad }}
                                </span>
                            </td>

                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{
                                    claseFromController.periodo_de_inicio_de_ejecucion
                                }} </span></td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{
                                    claseFromController.vigencias_anteriores
                                }} </span></td>
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{
                                    claseFromController.valor_asignado_en_la_vigencia_anterior
                                }} </span></td>
                            <!--                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{ claseFromController.procesos_involucrados }} </span></td>-->
                            <!--                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{ claseFromController.plan_de_mejoramiento_al_que_apunta_la_necesidad }} </span></td>-->
                            <!--                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{ claseFromController.linea_del_plan_desarrollo_al_que_apunta_la_necesidad }} </span></td>-->
                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span
                                class="max-w-[220px] min-w-[40px]"> {{ claseFromController.frecuencia_de_uso }} </span>
                            </td>
                            <!--                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{ claseFromController.mantenimientos_requeridos }} </span></td>-->
                            <!--                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{ claseFromController.capacidad_instalada }} </span></td>-->
                            <!--                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{ claseFromController.riesgo_de_la_inversion }} </span></td>-->
                            <!--                            <td class=" text-center py-4 px-2 sm:py-3 w-64"><span class="max-w-[220px] min-w-[40px]"> {{ claseFromController.valor_total_de_la_solicitud_actual }} </span></td>-->
                        </tr>
                        <!--                            building  -->


                        <!--                            <tr v-for="(claseFromController, indexu) in props.fromController.data" :key="indexu"-->
                        <!--                                class="border-t border-gray-200 dark:border-gray-700 hover:bg-sky-100 hover:dark:bg-gray-900/20 even:bg-gray-300">-->
                        <!--                                <td v-for="titulo in titulos" class=" text-center py-4 px-2 sm:py-3 w-64">-->
                        <!--                                    <span v-if="titulo['type'] === 'alterNumber'" class="max-w-[120px]"> {{ parseInt(claseFromController[titulo['order']])+1 }} </span>-->
                        <!--                                    <p v-if="titulo['type'] === 'text'" class="mx-auto text-center text-sm min-w-[200px]"> {{ PrimerasPalabras(claseFromController[titulo['order']], 30) }} </p>-->
                        <!--                                    <p v-if="titulo['type'] === 'minitext'" class="mx-auto text-center text-sm max-w-[120px]"> {{ PrimerasPalabras(claseFromController[titulo['order']], 30) }} </p>-->
                        <!--                                    <span v-if="titulo['type'] === 'number'"> {{ number_format(claseFromController[titulo['order']], 0, false) }} </span>-->
                        <!--                                    <span v-if="titulo['type'] === 'numberWithUM'">-->
                        <!--                                        {{ number_format(claseFromController[titulo['order']], 0, false) }}&nbsp{{claseFromController.unidad_de_medida}}-->
                        <!--                                    </span>-->
                        <!--                                    <span v-if="titulo['type'] === 'dinero'"> {{ number_format(claseFromController[titulo['order']], 0, true) }} </span>-->
                        <!--                                    <span v-if="titulo['type'] === 'date'"> {{ formatDate(claseFromController[titulo['order']], false) }} </span>-->
                        <!--                                    <span v-if="titulo['type'] === 'datetime'"> {{ formatDate(claseFromController[titulo['order']], true) }} </span>-->
                        <!--                                    <span v-if="titulo['type'] === 'foreign'" class="min-w-[400px]"> {{ claseformularioa[titulo['order']][titulo['nameid']] }} </span>-->
                        <!--                                    <span v-if="titulo['type'] === 'boolEnviado'" class="max-w-[90px]"> {{ (claseFromController[titulo['order']] ? '✅' : 'Guardado') }} </span>-->
                        <!--                                    <p v-if="titulo['type'] === 'selectsMultiple'" class="min-w-[200px]"> {{ (claseFromController[titulo['newName']]) }} </p>-->
                        <!--                                </td>-->
                        <!--                            </tr>-->
                        </tbody>
                    </table>
                    <h2 v-else class="text-center text-xl my-8">Sin Registros</h2>
                </div>
                <div v-if="props.totalValorUnitario < 0"
                     class="border border-blue-300 shadow rounded-md p-4 max-w-sm w-full mx-auto">
                    <div class="animate-pulse flex space-x-4">
                        <div class="rounded-full bg-slate-700 h-8 w-8"></div>
                        <div class="flex-1 space-y-6 py-1">
                            <div class="h-2">Calculando...</div>
                        </div>
                    </div>
                </div>
                <p v-else class="whitespace-nowrap py-4 px-2 sm:py-3 text-center font-bold text-lg">Costo total:
                    {{ plata_format(props.totalValorUnitario) }}</p>
                <!--                    v-if="props.total"-->
                <div class="flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700">
                    <Pagination :links="props.fromController" :filters="data.params"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style scoped>
.inamovible {
    position: fixed;
    top: 0;
    left: 250px;
    z-index: 100;
}

/* Añade estilos adicionales según tus necesidades */
</style>
