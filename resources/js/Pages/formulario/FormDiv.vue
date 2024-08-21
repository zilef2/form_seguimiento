<template>
    <div class="">
        <InputLabel :for="nombre" :value="lang().label[props.nombre]"/>
        <TextInput :id="nombre" type="text" class="mt-1 block w-full"
                   v-model="thevalor" required :placeholder="props.nombre"
                   :error="form.errors.nombre" :disabled="props.disabled"/>
        <InputError class="mt-2" :message="form.errors.nombre"/>
    </div>
</template>
<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import {defineProps, defineEmits, ref, watch, onMounted} from 'vue';
const emit = defineEmits([
    'update:valor',
    'update:form',
]);
    
const props = defineProps({
    valor: {
        type: String,
        default: '',
        required: true
    },
    nombre:String,
    form:Object,
    disabled:{
        type:Boolean,
        default:false,
        required:false,
    },
})

let form = ref({ ...props.form });
let thevalor = ref(props.valor);
watch(thevalor, (newVal) => {
    emit('update:valor', newVal);
});

watch(() => props.form, (newVal) => {
    form.value = { ...newVal }; // Actualiza el form localmente
}, {deep:true});

// Watch para emitir los cambios del form local
watch(form, (newVal) => {
    emit('update:form', newVal);
});
</script>