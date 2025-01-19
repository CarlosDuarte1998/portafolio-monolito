<script setup>
import TextEditor from '@/Components/Admin/TextEditor.vue';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SectionTitle from '@/Components/SectionTitle.vue';
import TextInput from '@/Components/TextInput.vue';
import { useAboutMeStore } from '@/stores/aboutMe';
import { onMounted, ref } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import FileManager from '@/Components/Admin/FileManager.vue';

const aboutMeStore = useAboutMeStore();

onMounted(async() => {
    await aboutMeStore.fetchAboutMe();
});





</script>

<template>
    <div class="p-10">
        <div class="flex flex-col gap-4">
            <SectionTitle>
                <template #description>
                    Aquí puedes editar la información de la sección Acerca de mi.
                </template>
            </SectionTitle>


            <form>
                <div class="flex flex-col gap-4">
                    <SectionTitle>
                        <template #title>
                            Información personal
                        </template>
                    </SectionTitle>
                    <div class="flex w-full gap-4">
                        
                        <div class="w-full">
                            <label for="name">Nombre</label>
                            <TextInput v-model="aboutMeStore.dataResponse.name" />
                        </div>
                        <div class="w-full">
                            <label for="email">Correo electrónico</label>
                            <TextInput v-model="aboutMeStore.dataResponse.email" />
                        </div>
                    </div>
                    <div class="flex w-full gap-4">
                        <div class="">
                            <label for="name">Numero de celular</label>
                            <TextInput v-model="aboutMeStore.dataResponse.phone" />
                        </div>
                        <div class="w-full">
                            <label for="email">Dirección</label>
                            <TextInput v-model="aboutMeStore.dataResponse.address" />
                        </div>
                    </div>

                    <SectionTitle>
                        <template #title>
                            Redes sociales
                        </template>
                    </SectionTitle>

                    <div class="flex w-full gap-4">
                        <div class="w-full">
                            <label for="name">
                                <FontAwesomeIcon icon="fa-brands fa-github" class="icon-brand"/>
                            </label>
                            <TextInput v-model="aboutMeStore.dataResponse.github_url" />
                        </div>
                        <div class="w-full">
                            <label for="email">
                                <FontAwesomeIcon icon="fa-brands fa-instagram" class="icon-brand"/>
                            </label>
                            <TextInput v-model="aboutMeStore.dataResponse.instagram_url" />
                        </div>

                    </div>
                    <div class="flex w-full gap-4">
                        <div class="w-full">
                            <label for="name"><FontAwesomeIcon icon="fa-brands fa-x-twitter" class="icon-brand"/></label>
                            <TextInput v-model="aboutMeStore.dataResponse.twitter_url" />
                        </div>
                        <div class="w-full">
                            <label for="email">
                                <FontAwesomeIcon icon="fa-brands fa-youtube" class="icon-brand"/>
                            </label>
                            <TextInput v-model="aboutMeStore.dataResponse.youtube_url" />
                        </div>

                    </div>
                    <div class="flex w-full gap-4">
                        <div class="w-full">
                            <label for="name"><FontAwesomeIcon icon="fa-brands fa-linkedin" class="icon-brand"/></label>
                            <TextInput v-model="aboutMeStore.dataResponse.linkedin_url" />
                        </div>
                        <div class="w-full">
                            <label for="name"><FontAwesomeIcon icon="fa-brands fa-facebook" class="icon-brand"/></label>
                            <TextInput v-model="aboutMeStore.dataResponse.facebook_url" />
                        </div>

                    </div>
                    <SectionTitle class="mt-5">
                        <template #title>
                            Archivos multimedia
                        </template>
                    </SectionTitle>
                    <div class="flex w-full gap-4">
                        
                        <div class="w-full">
                            <label for="name">Foto de perfil</label>
                            <FileManager typeFile="image" textFile="Sube una foto de perfil" class="w-full"/>
                        </div>

                        <div class="w-full">
                            <label for="name">Curriculum vitae</label>
                            <FileManager typeFile="file" textFile="Selecciona archivo PDF" class="w-full"/>
                        </div>
                    </div>

                    <div>
                        <label for="name">Descripción</label>
                        <TextEditor v-model="aboutMeStore.dataResponse.description" />
                    </div>

                </div>
                <div class="mt-4 flex gap-4">
                    <PrimaryButton>
                        Guardar
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
.icon-brand {
    font-size: 1.5rem;
}

</style>
