<template>
    <div>
        <label :htmlFor="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 capitalize">
            {{ nombre }}
        </label>
        <textarea
            name="messageLargo"
            rows="4"
            class="block w-full px-3 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            :placeholder="placeholder + nombre"
            v-model="thevalor"
        />
    </div>
</template>

<script setup>
import { defineProps, defineEmits, ref, watch } from 'vue';

const emit = defineEmits(['update:valor']);

const props = defineProps({
    placeholder: String,
    valor: {
        type: String,
        default: '',
        required: true,
    },
    nombre: String,
});

// Hacer que thevalor sea reactivo y refleje cambios desde props.valor
let thevalor = ref(props.valor);

// Ver si cambia el valor en props.valor y actualizar thevalor
watch(() => props.valor, (newVal) => {
    thevalor.value = newVal;
});

// Emitir el valor actualizado cuando thevalor cambie
watch(thevalor, (newVal) => {
    emit('update:valor', newVal);
});
</script>
