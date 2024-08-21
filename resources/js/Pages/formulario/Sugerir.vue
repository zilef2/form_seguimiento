<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm} from '@inertiajs/vue3';
import {onMounted, reactive, watchEffect} from 'vue';
import "vue-select/dist/vue-select.css";
import FormDiv from "@/Pages/formulario/FormDiv.vue";

const props = defineProps({
    show: Boolean,
    necesidad: Object,
    title: String,
    titulos: Object, //parametros de la clase principal
    losSelect:Object,
    numberPermissions:Number,
    estadosFormulario:Object,
    lider:Object,
})

const emit = defineEmits(["close"]);
const data = reactive({
  printForm:[]
})

//very usefull
const justNames = props.titulos.map(names => names['order'] )
const form = useForm({ ...Object.fromEntries(justNames.map(field => [field, ''])) });
onMounted(() => {
    if(props.numberPermissions > 9000){
        const valueRAn = Math.floor(Math.random() * 9 + 1)
        form.nombre = 'admin orden trabajo '+ (valueRAn);
        form.codigo = (valueRAn);
        // form.hora_inicial = '0'+valueRAn+':00'//temp
        // form.fecha = '2023-06-01'
    }
    // data.printForm.length -= 1 //dependex
});

props.titulos.forEach(names => {
    data.printForm.push ({
        idd: names['order'], label: names['label'], type: names['type']
        , value: form[names['order']]
    })
});

watchEffect(() => {
    if (props.show) {
        form.errors = {}
        props.titulos.forEach(names => {
            form[names['order']] =
                props.necesidad[names['order']]
        });
    }
})

const calcular10 = () =>{
    form.cantidad_sugerida = Math.round(form.cantidad * 0.9,3)
    form.valor_unitario_sugerida = Math.round(form.valor_unitario * 0.9,3)
    form.valor_total_solicitatdo_por_necesidad_sugerida = Math.round(form.valor_total_solicitatdo_por_necesidad * 0.9,3)
}

const update = () => {
    form.put(route('formularioupdate2', props.lider?.id), {
        preserveScroll: true,
        onSuccess: () => {
            emit("close")
            form.reset()
        },
        onError: () => null,
        onFinish: () => null,
    })
}
// const sexos = [ { label: 'Masculino', value: 'Masculino' }, { label: 'Femenino', value: 'Femenino' } ];

</script>

<template>
    <section class="space-y-6">
        <Modal :show="props.show" @close="emit('close')" :maxWidth="'3xl'">
            <form class="p-6" @submit.prevent="create">
                <h2 class="text-xl my-4 font-medium text-gray-900 dark:text-gray-100">
                    {{ lang().label.edit }} {{ props.title }}
                </h2>
<!--                borrar aquiiii-->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-2">
                    <div class=""> 
                        <InputLabel :for="estado" :value="lang().label.estado" />
                        <TextInput :id="estado" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            :value="props.estadosFormulario.find(ele =>  ele.id === form.estado).nombre"
                             required placeholder="estado"
                            :error="form.errors.estado" />
                        <InputError class="mt-2" :message="form.errors.estado" />
                    </div>
                    
                    <div class=""> 
                        <InputLabel :for="nombre" :value="lang().label.nombre" />
                        <TextInput :id="nombre" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.nombre" required placeholder="nombre"
                            :error="form.errors.nombre" />
                        <InputError class="mt-2" :message="form.errors.nombre" />
                    </div>
                    <div class="md:col-span-2"> 
                        <InputLabel :for="necesidad" :value="lang().label.necesidad" />
                        <TextInput :id="necesidad" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.necesidad" required placeholder="necesidad"
                            :error="form.errors.necesidad" />
                        <InputError class="mt-2" :message="form.errors.necesidad" />
                    </div>
                    <div class="md:col-span-2"> 
                        <InputLabel :for="justificacion" :value="lang().label.justificacion" />
                        <TextInput :id="justificacion" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.justificacion" required placeholder="justificacion"
                            :error="form.errors.justificacion" />
                        <InputError class="mt-2" :message="form.errors.justificacion" />
                    </div>
                    <div class="md:col-span-2 mb-12"> 
                        <InputLabel :for="actividad" :value="lang().label.actividad" />
                        <TextInput :id="actividad" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.actividad" required placeholder="actividad"
                            :error="form.errors.actividad" />
                        <InputError class="mt-2" :message="form.errors.actividad" />
                    </div>
                    
                    <div class="md:col-span-full"><p class="text-center underline cursor-pointer" @click="calcular10"> Disminuir 10%</p></div>
                    
                    
                    
                    <FormDiv :nombre="'cantidad'" v-model:valor="form.cantidad" :form="form" disabled="true"/>
                    <div class=""> 
                        <InputLabel :for="cantidad_sugerida" :value="lang().label.cantidad_sugerida" />
                        <TextInput :id="cantidad_sugerida" type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.cantidad_sugerida" required placeholder="cantidad_sugerida"
                            :error="form.errors.cantidad_sugerida" />
                        <InputError class="mt-2" :message="form.errors.cantidad_sugerida" />
                    </div>
                    
                    <FormDiv :nombre="'valor_unitario'" v-model:valor="form.valor_unitario" :form="form" :disabled="true"/>
                    <div class=""> 
                        <InputLabel :for="valor_unitario_sugerida" :value="lang().label.valor_unitario_sugerida" />
                        <TextInput :id="valor_unitario_sugerida" type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.valor_unitario_sugerida" required placeholder="valor_unitario_sugerida"
                            :error="form.errors.valor_unitario_sugerida" />
                        <InputError class="mt-2" :message="form.errors.valor_unitario_sugerida" />
                    </div>
                    <FormDiv :nombre="'valor_total_solicitatdo_por_necesidad'" v-model:valor="form.valor_total_solicitatdo_por_necesidad" :form="form" :disabled="true"/>
                    <div class=""> 
                        <InputLabel :for="valor_total_solicitatdo_por_necesidad_sugerida" :value="lang().label.valor_total_solicitatdo_por_necesidad_sugerida" />
                        <TextInput :id="valor_total_solicitatdo_por_necesidad_sugerida" type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.valor_total_solicitatdo_por_necesidad_sugerida" required placeholder="valor_total_solicitatdo_por_necesidad_sugerida"
                            :error="form.errors.valor_total_solicitatdo_por_necesidad_sugerida" />
                        <InputError class="mt-2" :message="form.errors.valor_total_solicitatdo_por_necesidad_sugerida" />
                    </div>
                    
                    
                    <div class="mt-8"> 
                        <InputLabel :for="periodo_de_inicio_de_ejecucion" :value="lang().label.periodo_de_inicio_de_ejecucion" />
                        <TextInput :id="periodo_de_inicio_de_ejecucion" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.periodo_de_inicio_de_ejecucion" required placeholder="periodo_de_inicio_de_ejecucion"
                            :error="form.errors.periodo_de_inicio_de_ejecucion" />
                        <InputError class="mt-2" :message="form.errors.periodo_de_inicio_de_ejecucion" />
                    </div>
                    <div class="mt-8"> 
                        <InputLabel :for="vigencias_anteriores" :value="lang().label.vigencias_anteriores" />
                        <TextInput :id="vigencias_anteriores" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.vigencias_anteriores" required placeholder="vigencias_anteriores"
                            :error="form.errors.vigencias_anteriores" />
                        <InputError class="mt-2" :message="form.errors.vigencias_anteriores" />
                    </div>
                    <div class=""> 
                        <InputLabel :for="valor_asignado_en_la_vigencia_anterior" :value="lang().label.valor_asignado_en_la_vigencia_anterior" />
                        <TextInput :id="valor_asignado_en_la_vigencia_anterior" disabled type="text" class="mt-1 block w-full bg-gray-100"
                            v-model="form.valor_asignado_en_la_vigencia_anterior" required placeholder="valor_asignado_en_la_vigencia_anterior"
                            :error="form.errors.valor_asignado_en_la_vigencia_anterior" />
                        <InputError class="mt-2" :message="form.errors.valor_asignado_en_la_vigencia_anterior" />
                    </div>
                </div>
                
                
                
<!--                props.estadosFormulario.find(ele =>  ele.id === claseFromController.estado).nombre-->
                <div class=" my-8 flex justify-end">
                    <SecondaryButton :disabled="form.processing" @click="emit('close')"> {{ lang().button.close }}
                    </SecondaryButton>
                    <PrimaryButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        @click="update">
                        {{ form.processing ? lang().button.save + '...' : lang().button.save }}
                    </PrimaryButton>
                </div>
            </form>
        </Modal>
    </section>
</template>

<style>
textarea {
    @apply px-3 py-2 border border-gray-300 rounded-md;
}

[name="labelSelectVue"],
.muted {
    color: #1b416699;
}

[name="labelSelectVue"] {
    /* font-size: 22px; */
    font-weight: 600;
}
</style>
