<script setup>
import Breadcrumb from '@/Components/Breadcrumb.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import TextAreaZilef from "@/Pages/formulario/TextAreaZilef.vue";
import {form} from "@/Pages/formunique";
import SelectInput from "@/Components/SelectInput.vue";
import InputError from "@/Components/InputError.vue";
import vselect from "vue-select";
import "vue-select/dist/vue-select.css";
import TextInput from "@/Components/TextInput.vue";
import {handledinero, handleCantidad, calcularTotal, handledinerVigAnt} from "@/Pages/CreateFormFunctions";
import {borrarplan_de_mejoramiento_al_que_apunta_la_necesidad, borrarprocesos_involucrados} from "@/Pages/formFunctions";
import {reactive, ref, watch, onMounted, watchEffect} from "vue";


// roles: Number,
const props = defineProps({
  formularioGuardado: Object,
  breadcrumbs: Object,
  title: String,
  numberPermissions: Number,
  losSelect: Object,
})
const data = reactive({
  valor_total_solicitatdo_por_necesidad: 0,
})
onMounted(() => {
  form.valor_asignado_en_la_vigencia_anterior = 0

})

watchEffect(() => {
  handleCantidad(form)
  form.valor_total_solicitatdo_por_necesidad = calcularTotal(form.valor_unitario, form.cantidad, data)

  borrarprocesos_involucrados(form)
  borrarplan_de_mejoramiento_al_que_apunta_la_necesidad(form)
})


const create = () => {
  //todo: validar (deep mode) que no se le permita seleccionar mas opciones si label:ninguno
  //todo: validar queno haya vacios
  if (form.vigencias_anteriores.value === 'No') form.valor_asignado_en_la_vigencia_anterior = 0
  form.post(route('formu.store'), {
    preserveScroll: true,
    forceFormData: true,
    onSuccess: () => form.reset(),
    // onError: () => null,
    // onError: () => alert('¡Hay campos faltantes!'),
    onError: () => alert(JSON.stringify(form.errors, null, 4)),
    onFinish: () => null,
  })
}

// const sexos = [ { label: 'Masculino', value: 'Masculino' }, { label: 'Femenino', value: 'Femenino' } ];
// const asd = [{"1": "Bienestar", "2": "Bienes"}]
</script>

<template>
  <Head title="Dashboard"/>
  <AuthenticatedLayout>
    <Breadcrumb :title="title" :breadcrumbs="breadcrumbs"/>
    <div class="bg-gray-100 dark:bg-gray-900 py-2 md:py-16 lg:py-2">
      <div class="flex-wrap mx-auto px-1 sm:px-6 lg:px-8 gap-8">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 md:p-10 lg:p-12">
          <h1 class="text-2xl font-bold text-[#499884] dark:text-gray-100 mb-6">Necesidades económicas anuales por
            dependencia</h1>
          <p class="text-gray-600 dark:text-gray-400 mb-8">Llena el siguiente formulario para que podamos ayudarte.</p>
          <form @submit.prevent="create" method="POST" class="space-y-6 grid grid-cols-2 gap-4">
            <div class="col-span-2">
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Procesos involucrados
              </label>
              <vselect
                  :options="props.losSelect.procesos_involucrados"
                  v-model="form.procesos_involucrados"
                  label="label" class="col-span-2" multiple></vselect>
            </div>
            <div class="col-span-2">
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Plan de mejoramiento al que apunta la necesidad
              </label>
              <vselect
                  :options="props.losSelect.plan_de_mejoramiento_al_que_apunta_la_necesidad"
                  v-model="form.plan_de_mejoramiento_al_que_apunta_la_necesidad"
                  label="label" class="col-span-2" multiple></vselect>
            </div>
            <div class="col-span-2">
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Linea del plan desarrollo al que apunta la necesidad
              </label>
              <vselect
                  :options="props.losSelect.linea_del_plan_desarrollo_al_que_apunta_la_necesidad"
                  v-model="form.linea_del_plan_desarrollo_al_que_apunta_la_necesidad"
                  label="label" class="col-span-2" multiple></vselect>
            </div>

<!--            frecuencia_de_uso: '', //selec-->
<!--mantenimientos_requeridos: '', //selec-->
<!--capacidad_instalada: '', //caso especial:Si, ¿Cual? -->
<!--riesgo_de_la_inversion: '',-->

            <div v-if="Object.keys(form.errors).length > 0" class="col-span-full">
              <ul>
                <li v-for="(errorMessages, field) in form.errors" :key="field">
                  <strong>{{ field.replace(/_/g, ' ') }}:</strong>
                  <ul>{{ errorMessages }}</ul>
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
