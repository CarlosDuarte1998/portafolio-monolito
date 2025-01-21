<script setup>
import  { Head } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import SectionTitle from '@/Components/SectionTitle.vue';
import DataTable from '@/Components/Admin/DataTable.vue';
import TextInput from '@/Components/TextInput.vue';
import DatePicker from '@/Components/Admin/DatePicker.vue';
import TextEditor from '@/Components/Admin/TextEditor.vue';
import FileManager from '@/Components/Admin/FileManager.vue';
import InputIcon from '@/Components/Admin/InputIcon.vue';
import ChipComponent from '@/Components/Admin/ChipComponent.vue';
import AutoComplete from '@/Components/Admin/AutoComplete.vue';
import { useProjectStore } from '@/stores/projects';
import { useSkillStore } from '@/stores/skills';
import { onMounted, ref } from 'vue';
const skillStore = useSkillStore();
const projectStore = useProjectStore();

const dataSkills = ref([]);

onMounted(async() => {
    await skillStore.getSkills();
    dataSkills.value = skillStore.filterProjects;
});

</script>

<template>

    <Head title="Proyectos" />
    <div class="p-10">

        <SectionTitle>
            <template #title>
                Proyectos
            </template>
        </SectionTitle>

        <form action="">
            <div class="grid gap-4 mt-4">

                <!-- Section info of the project -->
                <div class="flex gap-4 w-full">
                    <div class="w-full">
                        <label for="title">Titulo</label>
                        <TextInput name="title" textPlaceholder="Ingrese un titulo" class="" />
                    </div>
                    <div class="w-full flex gap-4">
                        <div class="w-full">
                            <label for="description">Fecha de inicio</label>
                            <DatePicker name="description" class="" />
                        </div>
                        <div class="w-full">
                            <label for="description">Fecha final</label>
                            <DatePicker name="description" class="" />
                        </div>
                    </div>
                </div>


                <div class="flex gap-4">
                    <div class="w-full">
                        <!-- Section Skills -->
                        <SectionTitle>
                            <template #title>
                                Skills
                            </template>
                        </SectionTitle>
                        <div class="grid gap-4">
                            <div class="w-full flex">
                                <AutoComplete :dataSkill="dataSkills" />
                            </div>
                            <ChipComponent :labels="projectStore.dataChip" />
                        </div>
                    </div>
                    <!-- Section social media -->
                    <div class="w-full">
                        <SectionTitle>
                            <template #title>
                                Enlaces
                            </template>
                            <template #description>
                                <p>Enlace a la página del proyecto</p>
                            </template>
                        </SectionTitle>

                        <div class="flex gap-4">
                            <div>
                                <InputIcon textPlaceholder="Enlace a GitHub">
                                    <template #icon>
                                        <FontAwesomeIcon icon="fa-brands fa-github" class="icon-brand" />
                                    </template>
                                </InputIcon>
                            </div>
                            <div>
                                <InputIcon textPlaceholder="Enlace del proyecto">
                                    <template #icon>
                                        <FontAwesomeIcon icon="fa-solid fa-share" class="icon-brand" />
                                    </template>
                                </InputIcon>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section images -->
                <div class="">
                    <label for="image">Foto de portada</label>
                    <FileManager name="image" textFile="Elije una foto de portada" />
                </div>


                <!-- Section description -->
                <div>
                    <label for="description">Descripción</label>
                    <TextEditor name="description" class="" />
                </div>

            </div>

        </form>


    </div>
</template>

<style scoped>

    
</style>