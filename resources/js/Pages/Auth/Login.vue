<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuntheticationIllustration from '@/Components/AuntheticationIllustration.vue';
import login from '@/Components/svgs/login.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head :title="lang().label.login" />
        <template #illustration>
            <login class="w-full h-auto"></login>
        </template>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="">
            <div>
                <InputLabel for="email" :value="lang().label.identificacion" />
<!--                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username"  :error="form.errors.email" />-->
                <TextInput id="number" type="text" class="mt-1 block w-full" v-model="form.email" required autofocus  autocomplete="username"  :error="form.errors.email" />
                <InputError class="mt-2" :message="form.errors.email" />
<!--              :placeholder="lang().placeholder.email"-->
            </div>

            <div class="mt-4">
                <InputLabel for="password" :value="lang().label.password" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="current-password" :placeholder="lang().placeholder.password" :error="form.errors.password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ lang().label.remember_me }}</span>
                </label>
            </div>
            <div class="flex items-center justify-between mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800">
                {{ lang().label.lost_password }}
                </Link>
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ form.processing ? lang().button.login + '...' : lang().button.login }}
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
