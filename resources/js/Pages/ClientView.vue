<script setup>
import AppClient from '@/Layouts/AppClient.vue';
import HomeClient from './Client/HomeClient.vue';

import { Head } from '@inertiajs/vue3';

const title = 'Client View';



</script>

<template>
    <main >
        <AppClient>
            <HomeClient>
            </HomeClient>
        </AppClient>
    </main>
</template>

<style scoped>
</style>