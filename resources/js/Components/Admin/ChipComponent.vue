<template>
    <div class="card flex flex-wrap gap-2">
        <transition-group name="fade" tag="div" class="flex flex-wrap gap-2">
            <template v-for="(label, index) in labels" :key="label">
                <Chip 
                    :label="label" 
                    removable 
                    class="bg-green-200 font-bold" 
                    @remove="removeChip(index)" 
                />
            </template>
        </transition-group>
    </div>
</template>

<script setup>
import Chip from 'primevue/chip';
import { ref } from 'vue';


const props = defineProps({
    labels: {
        type: Array,
        default: () => ['Trailer', 'Drama', 'Comedia', 'Acción']
    }
});

const emit = defineEmits(['update:labels']);

const removeChip = (index) => {
    props.labels.splice(index, 1);
    emit('update:labels', props.labels);
};
</script>

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
}
</style>
