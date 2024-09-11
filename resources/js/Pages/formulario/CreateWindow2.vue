<script setup>
import Breadcrumb from "@/Components/Breadcrumb.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import TextAreaZilef from "@/Pages/formulario/TextAreaZilef.vue";
import { form } from "@/Pages/formunique";
import SelectInput from "@/Components/SelectInput.vue";
import InputError from "@/Components/InputError.vue";
import vselect from "vue-select";
import "vue-select/dist/vue-select.css";
import TextInput from "@/Components/TextInput.vue";
import {
  handledinero,
  handleCantidad,
  calcularTotal,
  handledinerVigAnt,
} from "@/Pages/CreateFormFunctions";
import {
  borrarplan_de_mejoramiento_al_que_apunta_la_necesidad,
  borrarprocesos_involucrados,
} from "@/Pages/formFunctions";
import { reactive, ref, watch, onMounted, watchEffect } from "vue";
import SimpleToast from "@/Components/SimpleToast.vue";
import Toast from "@/Components/Toast.vue";

// roles: Number,
const props = defineProps({
  formularioGuardado: Object,
  breadcrumbs: Object,
  title: String,
  numberPermissions: Number,
  losSelect: Object,
});
const data = reactive({
  valor_total_solicitatdo_por_necesidad: 0,
  Otras_capacidad_instalada: true,
});
onMounted(() => {
  form.capacidad_instalada = "No";

  if (props.numberPermissions > 9000) {
    const valueRAn = Math.floor(Math.random() * 900 + 1);
    // form.proceso_que_solicita_presupuesto = 'Biblioteca';
    // form.necesidad = 'Prueba necesidad ' + (valueRAn);

    form.procesos_involucrados = { label: "Bienestar", value: "Bienestar" };
    form.plan_de_mejoramiento_al_que_apunta_la_necesidad = {
      label: "PMM Institucional",
      value: "PMM Institucional",
    };
    form.linea_del_plan_desarrollo_al_que_apunta_la_necesidad = {
      label: "1. Academia Transformadora de Vidas",
      value: "1. Academia Transformadora de Vidas",
    };
    form.frecuencia_de_uso = {
      label: "Días estipulados en el contrato",
      value: "Días estipulados en el contrato",
    };
    form.mantenimientos_requeridos = { label: "Diario", value: "Diario" };
    form.capacidad_instalada = { label: "No", value: "No" };
    form.riesgo_de_la_inversion = {
      label: "Riesgos de Corrupción",
      value: "Riesgos de Corrupción",
    };
  }
});
console.log(
  "=>(CreateWindow2.vue:67) form.procesos_involucrados",
  form.procesos_involucrados
);
console.log("funciona pues mk");

watchEffect(() => {
  handleCantidad(form);
  form.valor_total_solicitatdo_por_necesidad = calcularTotal(
    form.valor_unitario,
    form.cantidad,
    data
  );

  console.log(
    "=>(CreateWindow2.vue:67) form.procesos_involucrados",
    form.procesos_involucrados
  );
  // borrarprocesos_involucrados(form);
  // borrarplan_de_mejoramiento_al_que_apunta_la_necesidad(form);
});

watch(
  () => form.capacidad_instalada,
  (nuevx) => {
    if (nuevx.value === "Si, ¿Cual?") {
      data.Otras_capacidad_instalada = false;
      form.capacidad_instalada = "";
    } else {
      if (nuevx.value === "No" || nuevx.value === "no") {
        form.capacidad_instalada = "No";
        data.Otras_capacidad_instalada = true;
      }
    }
  },
  { deep: true }
);

let VolverNo = () => {
  form.capacidad_instalada = "No";
  data.Otras_capacidad_instalada = true;
};

const create = (event) => {
  event.preventDefault();
  //todo: validar (deep mode) que no se le permita seleccionar mas opciones si label:ninguno
  //todo: validar queno haya vacios
  if (form.vigencias_anteriores.value === "No")
    form.valor_asignado_en_la_vigencia_anterior = 0;
  form.post(route("PStore2", props.formularioGuardado.id), {
    preserveScroll: false,
    forceFormData: false,
    onSuccess: () => form.reset(),
    // onError: () => null,
    // onError: () => alert('¡Hay campos faltantes!'),
    onError: () => alert(JSON.stringify(form.errors, null, 4)),
    onFinish: () => null,
  });
};

// const sexos = [ { label: 'Masculino', value: 'Masculino' }, { label: 'Femenino', value: 'Femenino' } ];
// const asd = [{"1": "Bienestar", "2": "Bienes"}]
</script>

<template>
  <Head :title="props.title" />
  <AuthenticatedLayout>
    <SimpleToast :flash="$page.props.flash" />
    <Breadcrumb :title="title" :breadcrumbs="breadcrumbs" />
    <div class="bg-gray-100 dark:bg-gray-900 py-2 md:py-16 lg:py-2">
      <div class="flex-wrap mx-auto px-1 sm:px-6 lg:px-8 gap-8">
        <div
          class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 md:p-10 lg:p-12"
        >
          <h1 class="text-2xl font-bold text-[#499884] dark:text-gray-100 mb-6">
            Necesidades económicas anuales por dependencia
          </h1>
          <p class="text-gray-600 dark:text-gray-400 mb-8">
            Llena el siguiente formulario para que podamos ayudarte.
          </p>
          <form
            @submit.prevent="create"
            method="POST"
            class="space-y-6 grid grid-cols-2 gap-4"
          >
            <div class="col-span-2">
              <label
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
              >
                Procesos articulados
              </label>
              <vselect
                :options="props.losSelect.procesos_involucrados"
                v-model="form.procesos_involucrados"
                label="label"
                class="col-span-2"
                multiple
              ></vselect>
            </div>
            <div class="col-span-2">
              <label
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
              >
                Plan de Mejoramiento y Mantenimiento (PMM) al que apunta la necesidad
              </label>
              <vselect
                :options="props.losSelect.plan_de_mejoramiento_al_que_apunta_la_necesidad"
                v-model="form.plan_de_mejoramiento_al_que_apunta_la_necesidad"
                label="label"
                class="col-span-2"
                multiple
              ></vselect>
            </div>
            <div class="col-span-2">
              <label
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
              >
                Líneas del Plan de Desarrollo Institucional 2024-2028 al que apunta la
                necesidad
              </label>
              <vselect
                :options="
                  props.losSelect.linea_del_plan_desarrollo_al_que_apunta_la_necesidad
                "
                v-model="form.linea_del_plan_desarrollo_al_que_apunta_la_necesidad"
                label="label"
                class="col-span-2"
                multiple
              ></vselect>
            </div>

            <div class="col-span-2">
              <label
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                >Frecuencia de uso</label
              >
              <vselect
                :options="props.losSelect.frecuencia_de_uso"
                v-model="form.frecuencia_de_uso"
                label="label"
                class="col-span-2"
              ></vselect>
            </div>
            <div class="col-span-2">
              <label
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                >Mantenimientos Requeridos</label
              >
              <vselect
                :options="props.losSelect.mantenimientos_requeridos"
                v-model="form.mantenimientos_requeridos"
                label="label"
                class="col-span-2"
              ></vselect>
            </div>
            <div class="col-span-2">
              <label
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
              >
                Capacidad Instalada
                <span @prevent="create" @click="VolverNo">⏪</span>
              </label>
              <vselect
                v-if="data.Otras_capacidad_instalada"
                :options="props.losSelect.capacidad_instalada"
                v-model="form.capacidad_instalada"
                label="label"
                class="col-span-2"
              ></vselect>

              <div v-else class="w-full inline-flex">
                <textarea
                  cols="100"
                  rows="7"
                  v-model="form.capacidad_instalada"
                  type="text"
                  @keydown.enter.prevent="create"
                  class="w-full bg-zinc-200 text-black dark:text-white dark:bg-black font-mono ring-1 ring-zinc-400 focus:ring-1 focus:ring-sky-300 outline-none duration-300 placeholder:text-black placeholder:opacity-50 rounded-md px-4 py-2 shadow-md focus:shadow-lg focus:shadow-sky-200 dark:shadow-md dark:shadow-purple-500"
                  autocomplete="off"
                />
              </div>
              <InputError class="mt-2" :message="form.errors.capacidad_instalada" />
            </div>
            <div class="col-span-2">
              <label
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                >Riesgos</label
              >
              <vselect
                :options="props.losSelect.riesgo_de_la_inversion"
                v-model="form.riesgo_de_la_inversion"
                label="label"
                class="col-span-2"
                multiple
              ></vselect>
            </div>

            <div v-if="Object.keys(form.errors).length > 0" class="col-span-full">
              <ul>
                <li v-for="(errorMessages, field) in form.errors" :key="field">
                  <strong>{{ field.replace(/_/g, " ") }}:</strong>
                  <ul>
                    {{
                      errorMessages
                    }}
                  </ul>
                </li>
              </ul>
            </div>
            <div class="col-span-full">
              <button
                type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent hover:shadow-xl text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Registrar Necesidad
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
