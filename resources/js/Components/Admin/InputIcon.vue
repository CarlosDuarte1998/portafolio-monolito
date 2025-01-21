
<template>
    <div class="card flex justify-center">
        <IconField>
            <InputIcon>
                <slot name="icon"/>
            </InputIcon>
            <InputText v-model="value" :placeholder="textPlaceholder" />
        </IconField>
    </div>
</template>

<script setup>
import { IconField, InputIcon, InputText } from 'primevue';
import { ref } from 'vue';

const value = ref(null);

const props = defineProps({
    textPlaceholder: String
});
</script>
