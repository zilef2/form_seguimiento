<template>
    <div>
        <div v-if="Object.keys(form.errors).length > 0">
            <ul>
                <li v-for="(errorMessages, field) in form.errors" :key="field">
                    <strong>{{ field }}:</strong>
                    <ul>
                        <li v-for="(message, index) in errorMessages" :key="index">
                            {{ message }}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>

</script>
