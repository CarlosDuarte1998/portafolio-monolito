<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import ProjectsView from './Admin/ProjectsView.vue';
import AboutMeView from './Admin/AboutMeView.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               <template v-if="route().current('dashboard')">
                    Dashboard
                </template>
                <template v-if="route().current('projects')">
                    Proyectos
                </template>

                <template v-if="route().current('aboutMe')">
                    Acerca de mi
                </template>
            </h2>
        </template>

        <template #home>
            <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
        </template>

        <template #projects>
            <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ProjectsView />
                </div>
            </div>
        </div>
        </template>

        <template #aboutMe>
            <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <AboutMeView />
                </div>
            </div>
        </div>
        </template>
    </AppLayout>
</template>
