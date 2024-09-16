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
import {ChevronUpDownIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/solid';
import Create from '@/Pages/formulario/Create.vue';
import Edit from '@/Pages/formulario/Edit.vue';
import Delete from '@/Pages/formulario/Delete.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InfoButton from '@/Components/InfoButton.vue';
import {PrimerasPalabras, vectorSelect, formatDate, CalcularAvg, number_format, plata_format} from '@/global.ts';
import RadioButton from "@/Components/RadioButton.vue";

const {_, debounce, pickBy} = pkg
const props = defineProps({
    fromController: Object,
    total: Number,
    filters: Object,
    breadcrumbs: Object,
    perPage: Number,

    title: String,

    numberPermissions: Number,
    losSelect: Object,
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
    // frontp:{
    //     category: '',
    //     identity: '',
    //     liderchu: '',
    // },
    individual: null,
    formularioo: null,
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

    window.addEventListener('scroll', updateScroll);

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
        props.fromController?.data.forEach((formulario) => {
            data.selectedId.push(formulario.id)
        })
    }
}
const select = () => {
    if (props.fromController?.data.length === data.selectedId.length) {
        data.multipleSelect = true
    } else {
        data.multipleSelect = false
    }
}
// <!--</editor-fold>-->


// text // number // dinero // date // datetime // foreign //JUST THIS PROJECT: minitext //alterNumber
const titulos = [
    // { order: 'numero_necesidad', label: '#', type: 'alterNumber' },
    {order: 'identificacion_user', label: 'cc', type: 'minitext'},
    {order: 'userName', label: 'Lider', type: 'text'},
    {order: 'Nombre', label: 'Nombre', type: 'minitext'},
    {order: 'necesidad', label: 'necesidad', type: 'text'},
    {order: 'justificacion', label: 'justificacion', type: 'bigtext'},
    {order: 'proceso_que_solicita_presupuesto', label: 'Proceso que solicita presupuesto', type: 'selectsMultiple', newName: 'proceso_que_solicita_presupuest'},
    {order: 'actividad', label: 'Actividad', type: 'bigtext'},
    // { order: 'categoria', label: 'Categoria', type: 'text' },
    {order: 'categoria', label: 'Categoria', type: 'selectsMultiple', newName: 'Categori'},
    {order: 'cantidad', label: 'Cantidad', type: 'number'},
    {order: 'unidad_de_medida', label: 'Unidad de medida', type: 'text'},
    {order: 'valor_unitario', label: 'Valor unitario', type: 'dinero'},
    {order: 'valor_total_solicitatdo_por_necesidad', label: 'Valor total solicitatdo por necesidad', type: 'dinero'},
    {order: 'periodo_de_inicio_de_ejecucion', label: 'Periodo de inicio de ejecucion', type: 'text'},
    {order: 'vigencias_anteriores', label: 'Vigencias anteriores', type: 'text'},
    {order: 'valor_asignado_en_la_vigencia_anterior', label: 'Valor asignado en la vigencia anterior', type: 'dinero'},

    {
        order: 'procesos_involucrados',
        label: 'Procesos involucrados',
        type: 'selectsMultiple',
        newName: 'procesos_involucrado'
    },
    {
        order: 'plan_de_mejoramiento_al_que_apunta_la_necesidad',
        label: 'Plan de mejoramiento al que apunta la necesidad',
        type: 'selectsMultiple',
        newName: 'plan_de_mejoramiento_al_que_apunta_la_necesida'
    },
    {
        order: 'linea_del_plan_desarrollo_al_que_apunta_la_necesidad',
        label: 'Linea del plan desarrollo al que apunta la necesidad',
        type: 'selectsMultiple',
        newName: 'linea_del_plan_desarrollo_al_que_apunta_la_necesida'
    },

    {order: 'frecuencia_de_uso', label: 'Frecuencia de uso', type: 'text'},
    {order: 'mantenimientos_requeridos', label: 'Mantenimientos requeridos', type: 'text'},
    {order: 'capacidad_instalada', label: 'Capacidad instalada', type: 'text'},
    {order: 'riesgo_de_la_inversion', label: 'Riesgo de la inversion', type: 'text'},
    {order: 'valor_total_de_la_solicitud_actual', label: 'Valor total de la solicitud actual', type: 'dinero'},
    {order: 'enviado', label: 'Enviado', type: 'boolEnviado'},
    // { order: 'inventario', label: 'inventario', type: 'foreign',nameid:'nombre'},
    //   anexos
    //   user_id
];

const scrollY = ref(0);

const updateScroll = () => {
    scrollY.value = window.scrollY;
    console.log("=>(IndexSA.vue:180) scrollY.value", scrollY.value);
};
onBeforeUnmount(() => {
    window.removeEventListener('scroll', updateScroll);
});

data.claseSticky = computed(() => (scrollY.value > 300 ? 'fixed' : 'sticky'));
data.hayCongelado = computed(() => (scrollY.value > 300));

</script>

<template>
    <Head :title="props.title"/>
    <AuthenticatedLayout>

        <Breadcrumb :title="title" :breadcrumbs="breadcrumbs" class="capitalize text-xl font-bold"/>
        <div class="inline-flex text-center w-full">
            <Link :href="route('PreFormSimplificado')" v-show="can(['read user'])"
                  class="items-center py-2 px-1 underline text-sky-600">
                Aprobar
            </Link>
            <Link :href="route('formulario.create')"
                  v-show="can(['create formulario'])" class="items-center py-2 px-1 underline text-sky-600">
                Nueva necesidad
            </Link>
        </div>


        <div class="space-y-1">
            <div class="px-4 sm:px-0">
                <div class=" rounded-lg overflow-hidden w-fit"></div>
            </div>
            <div class=" bg-white dark:bg-gray-800 shadow rounded-lg">
                <div
                    v-sticky="{ zIndex: 100 }"
                    class="flex justify-items-start p-4 gap-6 dark:bg-gray-900/50 text-left top-0 bg-white rounded-lg border-gray-100 border-2"
                    :class="data.claseSticky">
                    <div class="flex">
                    </div>
                    <TextInput v-model="data.params.search" type="text"
                               placeholder="Necesidad o justificacion"
                               class="block w-1/6 md:w-1/5 rounded-lg"/>
                    <!--                    <SelectInput v-model="data.frontp.category" :dataSet="props.losSelect.ListarCategoria"-->
                    <!--                        class="block w-1/6 md:w-1/5 rounded-lg" />-->
                    <SelectInput v-show="can(['read user'])" v-model="data.params.liderchu"
                                 :dataSet="props.losSelect.todasLideres"
                                 class="block w-1/6 md:w-1/5 rounded-lg"/>

                    <TextInput v-show="can(['read user'])" v-model="data.params.searcLider" type="number"
                               placeholder="Cedula"
                               class="block w-1/6 md:w-1/5 rounded-lg"/>
                    <div class="grid grid-rows-2 mb-0.5 mx-1 h-8 z-20 gap-3">
<!--                        <div>-->
<!--                            <input v-model="data.params.SoloEnviados" type="radio" name="booleanFilters" value="Todos"-->
<!--                                   checked/>-->
<!--                            <label for="guardados" class="mx-2 text-xs">Todos</label>-->
<!--                        </div>-->
                        <div>
                            <input v-model="data.params.SoloEnviados" type="radio" name="booleanFilters"
                                   value="guardados"/>
                            <label for="guardados" class="mx-2 text-xs">Guardados</label>
                        </div>

                        <div>
                            <input v-model="data.params.SoloEnviados" type="radio" name="booleanFilters"
                                   value="enviados"/>
                            <label for="enviados" class="mx-2 text-xs">Enviados</label>
                        </div>
                    </div>
                </div>
                <div class="overflow-auto scrollbar-table max-h-[70vh]">
                    <table v-if="props.total > 0" class="min-w-full border-collapse overflow-y-scroll max-h-sm ">
                        <caption class="caption-top">
                            Necesidades del presupuesto
                        </caption>
                        <thead
                            class="sticky top-0 z-10 bg-white uppercase text-sm border-t border-gray-200 dark:border-gray-700">
                        <tr class="dark:bg-gray-900/50">
                            <th class="px-2 py-4 text-center">
                                <Checkbox v-model:checked="data.multipleSelect" @change="selectAll"/>
                            </th>
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
                            <td class="whitespace-nowrap py-4 px-2 sm:py-3 text-center">
                                <input
                                    type="checkbox" @change="select" :value="claseFromController.id"
                                    v-model="data.selectedId"
                                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800 dark:checked:bg-primary dark:checked:border-primary"
                                />
                            </td>
                            <td class="whitespace-nowrap py-4 px-2 sm:py-3">
                                <div class="flex justify-center items-center">
                                    <div class="rounded-md overflow-hidden">
                                        <Link :href="route('formularioEdit',claseFromController.id)" class="items-center py-2 px-1 underline text-sky-600">
                                            <InfoButton  type="button"
                                                class="px-2 py-1.5 rounded-lg" v-tooltip="lang().tooltip.edit">
                                                <PencilIcon class="w-4 h-4" />
                                            </InfoButton>
                                        </Link>

<!--                                        <Link :href="route('formulario.create')"-->
<!--                                              v-show="can(['create formulario'])" class="items-center py-2 px-1 underline text-sky-600">-->
<!--                                            Nueva necesidad-->
<!--                                        </Link>-->
                                        <!--                                            <DangerButton v-show="can(['delete user'])" type="button"-->
                                        <!--                                                @click="(data.deleteOpen = true), (data.user = user)"-->
                                        <!--                                                class="px-2 py-1.5 rounded-none" v-tooltip="lang().tooltip.delete">-->
                                        <!--                                                <TrashIcon class="w-4 h-4" />-->
                                        <!--                                            </DangerButton>-->
                                    </div>
                                </div>
                            </td>
                            <td v-for="titulo in titulos" class=" text-center py-4 px-2 sm:py-3 w-64">
                                <span v-if="titulo['type'] === 'alterNumber'" class="max-w-[120px]"> {{ parseInt(claseFromController[titulo['order']]) + 1 }} </span>
                                <p v-if="titulo['type'] === 'text'" class="mx-auto text-center text-sm min-w-[200px]">
                                    {{ PrimerasPalabras(claseFromController[titulo['order']], 18) }}
                                </p>
                                <p v-if="titulo['type'] === 'minitext'"
                                   class="mx-auto text-center text-sm max-w-[120px]">
                                    {{ PrimerasPalabras(claseFromController[titulo['order']], 10) }}
                                </p>
                                <p v-if="titulo['type'] === 'bigtext'"
                                   class="mx-auto text-center text-sm max-w-[300px]">
                                    {{ PrimerasPalabras(claseFromController[titulo['order']], 26) }}
                                </p>
                                <span v-if="titulo['type'] === 'number'"> {{ number_format(claseFromController[titulo['order']], 0, false) }} </span>
                                <span v-if="titulo['type'] === 'dinero'"> {{ number_format(claseFromController[titulo['order']], 0, true) }} </span>
                                <span v-if="titulo['type'] === 'date'"> {{ formatDate(claseFromController[titulo['order']], false) }} </span>
                                <span v-if="titulo['type'] === 'datetime'"> {{ formatDate(claseFromController[titulo['order']], true) }} </span>
                                <span v-if="titulo['type'] === 'foreign'" class="min-w-[400px]"> {{ claseformularioa[titulo['order']][titulo['nameid']] }} </span>
                                <span v-if="titulo['type'] === 'boolEnviado'" class="max-w-[90px]"> {{ (claseFromController[titulo['order']] ? '✅' : 'Guardado') }} </span>
                                <p v-if="titulo['type'] === 'selectsMultiple'" class="min-w-[200px]">
                                    {{ (claseFromController[titulo['newName']]) }} </p>
                            </td>
                        </tr>
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
                    <SelectInput v-model="data.params.perPage" :dataSet="data.dataSet" class="max-h-12"/>

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
