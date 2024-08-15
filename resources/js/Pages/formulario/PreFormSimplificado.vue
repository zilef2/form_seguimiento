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


const {_, debounce, pickBy} = pkg
const props = defineProps({
    numberPermissions: Number,
    Arraylideres: Object,
    estadosFormulario: Object,
})

const data = reactive({
    params: {},
})
onMounted(() => {
    // window.addEventListener('scroll', updateScroll);

});
const form = useForm({
    Arraylideres:0,
});

watchEffect(() => {
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
const select = () => {
    if (props.fromController?.data.length === data.selectedId.length) {
        data.multipleSelect = true
    } else {
        data.multipleSelect = false
    }
}
// <!--</editor-fold>-->

</script>

<template>
    <Head :title="props.title"/>

    <AuthenticatedLayout>
        <section class=" body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 lg:w-1/2">
                        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Seleccione</h2>
                            <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Lider a evaluar</h1>
                            <p class="leading-relaxed mb-3">Las cedulas listadas, son las que actualmente tienen necesidades enviadas.</p>
                            <SelectInput v-model="form.Arraylideres" :dataSet="form.Arraylideres" />
                            {{form.Arraylideres}}
                            
                            <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
                                <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                       viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                  </svg>1.2K
                                </span>
                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                       viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                  </svg>6
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
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