<script setup>
import  { Head } from '@inertiajs/vue3';
import SectionTitle from '@/Components/SectionTitle.vue';
import DataTable from '@/Components/Admin/DataTable.vue';
</script>

<template>
    <Head title="Proyectos" />
    <div class="p-10">

        <SectionTitle>
            <template #title>
                Proyectos
            </template>
        </SectionTitle>

        <DataTable />
    </div>
</template>