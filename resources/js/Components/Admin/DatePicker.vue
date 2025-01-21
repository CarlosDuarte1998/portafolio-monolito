
<template>
    <DatePicker v-model="props.value"  class="text-black rounded-md" showIcon iconDisplay="input"  />
</template>

<script setup>
import DatePicker from 'primevue/datepicker';
import { ref } from 'vue';

const date = ref(null);

const props = defineProps({
    value:{
        type: String,
        default: new Date().toISOString().substr(0, 10)
    }
});

</script>
        