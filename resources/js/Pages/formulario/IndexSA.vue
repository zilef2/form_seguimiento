<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import { reactive, watch, ref, watchEffect, onMounted } from 'vue';

import DangerButton from '@/Components/DangerButton.vue';
import pkg from 'lodash';
import { router, usePage, Link, useForm } from '@inertiajs/vue3';

import Pagination from '@/Components/Pagination.vue';
import { ChevronUpDownIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/solid';
// import { CursorArrowRippleIcon, ChevronUpDownIcon,QuestionMarkCircleIcon, EyeIcon, PencilIcon, TrashIcon, UserGroupIcon } from '@heroicons/vue/24/solid';

import Create from '@/Pages/formulario/Create.vue';
import Edit from '@/Pages/formulario/Edit.vue';
import Delete from '@/Pages/formulario/Delete.vue';

import Checkbox from '@/Components/Checkbox.vue';
import InfoButton from '@/Components/InfoButton.vue';

import { PrimerasPalabras, vectorSelect, formatDate, CalcularAvg, number_format } from '@/global.ts';

const { _, debounce, pickBy } = pkg
const props = defineProps({
    fromController: Object,
    total: Number,
    filters: Object,
    breadcrumbs: Object,
    perPage: Number,

    title: String,

    numberPermissions: Number,
    losSelect:Object,//normally used by headlessui
})

const data = reactive({
    params: {
        search: props.filters.search,
        field: props.filters.field,
        order: props.filters.order,
        perPage: props.perPage,
    },
    formularioo: null,
    selectedId: [],
    multipleSelect: false,
    createOpen: false,
    editOpen: false,
    deleteOpen: false,
    // deleteBulkOpen: false,
    dataSet: usePage().props.app.perpage,
})

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
const select = () => {
    if (props.fromController?.data.length == data.selectedId.length) {
        data.multipleSelect = true
    } else {
        data.multipleSelect = false
    }
}
// <!--</editor-fold>-->


// const form = useForm({ })
// watchEffect(() => { })


// text // number // dinero // date // datetime // foreign
const titulos = [
    // { order: 'codigo', label: 'codigo', type: 'text' },
    { order: 'numero_necesidad', label: '#', type: 'alterNumber' },
    { order: 'necesidad', label: 'necesidad', type: 'text' },
    { order: 'justificacion', label: 'justificacion', type: 'text' },
    { order: 'proceso_que_solicita_presupuesto', label: 'Proceso que solicita presupuesto', type: 'text' },
    { order: 'actividad', label: 'Actividad', type: 'text' },
    { order: 'categoria', label: 'Categoria', type: 'text' },
    { order: 'unidad_de_medida', label: 'Unidad de medida', type: 'text' },
    { order: 'cantidad', label: 'Cantidad', type: 'number' },
    { order: 'valor_unitario', label: 'Valor unitario', type: 'dinero' },
    { order: 'valor_total_solicitatdo_por_necesidad', label: 'Valor total solicitatdo por necesidad', type: 'dinero' },
    { order: 'periodo_de_inicio_de_ejecucion', label: 'Periodo de inicio de ejecucion', type: 'text' },
    { order: 'vigencias_anteriores', label: 'Vigencias anteriores', type: 'text' },
    { order: 'valor_asignado_en_la_vigencia_anterior', label: 'Valor asignado en la vigencia anterior', type: 'text' },
    { order: 'procesos_involucrados', label: 'Procesos involucrados', type: 'text' },
    { order: 'plan_de_mejoramiento_al_que_apunta_la_necesidad', label: 'Plan de mejoramiento al que apunta la necesidad', type: 'text' },
    { order: 'linea_del_plan_desarrollo_al_que_apunta_la_necesidad', label: 'Linea del plan desarrollo al que apunta la necesidad', type: 'text' },
    { order: 'frecuencia_de_uso', label: 'Frecuencia de uso', type: 'text' },
    { order: 'mantenimientos_requeridos', label: 'Mantenimientos requeridos', type: 'text' },
    { order: 'capacidad_instalada', label: 'Capacidad instalada', type: 'text' },
    { order: 'riesgo_de_la_inversion', label: 'Riesgo de la inversion', type: 'text' },
    { order: 'valor_total_de_la_solicitud_actual', label: 'Valor total de la solicitud actual', type: 'dinero' },
  // { order: 'inventario', label: 'inventario', type: 'foreign',nameid:'nombre'},
  //   anexos
  //   user_id
  //   enviado
];

</script>

<template>
    <Head :title="props.title" />

    <AuthenticatedLayout>
        <Breadcrumb :title="title" :breadcrumbs="breadcrumbs" class="capitalize text-xl font-bold"/>
        <div class="space-y-4">
            <!-- {{ props.fromController.data[2] }} -->
            <div class="px-4 sm:px-0">
                <div class="rounded-lg overflow-hidden w-fit">
<!--                    <PrimaryButton class="rounded-none" @click="data.createOpen = true"-->
<!--                        v-if="can(['create formulario'])">-->
<!--                        {{ lang().button.add }}-->
<!--                    </PrimaryButton>-->
<!--                    <Create v-if="can(['create formulario'])" :numberPermissions="props.numberPermissions"-->
<!--                        :titulos="titulos" :show="data.createOpen" @close="data.createOpen = false" :title="props.title"-->
<!--                        :losSelect=props.losSelect />-->

<!--                    <Edit v-if="can(['update formulario'])" :titulos="titulos"-->
<!--                        :numberPermissions="props.numberPermissions" :show="data.editOpen" @close="data.editOpen = false"-->
<!--                        :formularioa="data.formularioo" :title="props.title" :losSelect=props.losSelect />-->

<!--                    <Delete v-if="can(['delete formulario'])" :numberPermissions="props.numberPermissions"-->
<!--                        :show="data.deleteOpen" @close="data.deleteOpen = false" :formularioa="data.formularioo"-->
<!--                        :title="props.title" />-->
                </div>
            </div>
            <div class="relative bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex justify-between p-2">
                    <div class="flex space-x-2">
                        <SelectInput v-model="data.params.perPage" :dataSet="data.dataSet" />
                        <!-- <DangerButton @click="data.deleteBulkOpen = true"
                            v-show="data.selectedId.length != 0 && can(['delete formulario'])" class="px-3 py-1.5"
                            v-tooltip="lang().tooltip.delete_selected">
                            <TrashIcon class="w-5 h-5" />
                        </DangerButton> -->
                    </div>
                    <TextInput v-if="props.numberPermissions >= 0" v-model="data.params.search" type="text"
                        class="block w-4/6 md:w-3/6 lg:w-2/6 rounded-lg" placeholder="Necesidad" />
                </div>
                <div class="overflow-x-auto scrollbar-table">
                    <table v-if="props.total > 0" class="w-full">
                        <thead class="uppercase text-sm border-t border-gray-200 dark:border-gray-700">
                            <tr class="dark:bg-gray-900/50 text-left">
                                <th class="px-2 py-4 text-center">
                                    <Checkbox v-model:checked="data.multipleSelect" @change="selectAll" />
                                </th>
<!--                                <th v-if="numberPermissions > 1" class="px-2 py-4">Accion</th>-->

<!--                                <th class="px-2 py-4 text-center">#</th>-->
                                <th v-for="titulo in titulos" class="px-2 py-4 cursor-pointer"
                                    v-on:click="order(titulo['order'])">
                                    <div class="flex justify-between items-center">
                                        <span>{{ titulo['label'] }}</span>
<!--                                        <span>{{ lang().label[titulo['label']] }}</span>-->
                                        <ChevronUpDownIcon class="w-4 h-4" />
                                    </div>
                                </th>
                                <!-- <th class="px-2 py-4 cursor-pointer" v-on:click="order('fecha_nacimiento')">
                                    <div class="flex justify-between items-center"> <span>{{ lang().label.edad }}</span>
                                        <ChevronUpDownIcon class="w-4 h-4" />
                                    </div>
                                </th> -->

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(claseFromController, indexu) in props.fromController.data" :key="indexu"
                                class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-200/30 hover:dark:bg-gray-900/20">

                                <td class="whitespace-nowrap py-4 px-2 sm:py-3 text-center">
                                    <input
                                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800 dark:checked:bg-primary dark:checked:border-primary"
                                        type="checkbox" @change="select" :value="claseFromController.id"
                                        v-model="data.selectedId" />
                                </td>
                                <td v-if="numberPermissions > 1" class="whitespace-nowrap py-4 w-12 px-2 sm:py-3">
                                    <div class="flex justify-center items-center">
                                        <div class="rounded-md overflow-hidden">
                                            <InfoButton v-show="can(['update user'])" type="button"
                                                @click="(data.editOpen = true), (data.formularioo = claseFromController)"
                                                class="px-2 py-1.5 rounded-none" v-tooltip="lang().tooltip.edit">
                                                <PencilIcon class="w-4 h-4" />
                                            </InfoButton>
                                            <DangerButton v-show="can(['delete user'])" type="button"
                                                @click="(data.deleteOpen = true), (data.formularioo = claseFromController)"
                                                class="px-2 py-1.5 rounded-none" v-tooltip="lang().tooltip.delete">
                                                <TrashIcon class="w-4 h-4" />
                                            </DangerButton>
                                        </div>
                                    </div>
                                </td>
<!--                                <td class="whitespace-nowrap py-4 px-2 sm:py-3 text-center">{{ ++indexu }}</td>-->
                                <td v-for="titulo in titulos" class="whitespace-nowrap py-4 px-2 sm:py-3">
                                    <span v-if="titulo['type'] === 'text'"> {{ claseFromController[titulo['order']] }} </span>
                                    <span v-if="titulo['type'] === 'number'"> {{ number_format(claseFromController[titulo['order']], 0, false) }} </span>
                                    <span v-if="titulo['type'] === 'dinero'"> {{ number_format(claseFromController[titulo['order']], 0, true) }} </span>
                                    <span v-if="titulo['type'] === 'date'"> {{ formatDate(claseFromController[titulo['order']], false) }} </span>
                                    <span v-if="titulo['type'] === 'datetime'"> {{ formatDate(claseFromController[titulo['order']], true) }} </span>
                                    <span v-if="titulo['type'] === 'foreign'"> {{ claseformularioa[titulo['order']][titulo['nameid']] }} </span>
                                    <span v-if="titulo['type'] === 'alterNumber'"> {{ parseInt(claseFromController[titulo['order']])+1 }} </span>
                                </td>

                            </tr>
                            <tr class="border-t border-gray-600">
                                <td v-if="numberPermissions > 1"
                                    class="whitespace-nowrap py-4 w-12 px-2 sm:py-3 text-center"> -
                                </td>
                                <td class="whitespace-nowrap py-4 px-2 sm:py-3 text-center font-bold text-lg"> Total: </td>
                                <td class="whitespace-nowrap py-4 px-2 sm:py-3 text-center">
                                    {{ props.total }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h2 v-else class="text-center text-xl my-8">Sin Registros</h2>
                </div>
                <div v-if="props.total > 10"
                    class="flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700">
                    <Pagination :links="props.fromController" :filters="data.params" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
