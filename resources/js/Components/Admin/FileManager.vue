<script setup>
import vueFilePond from "vue-filepond";
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';


const FilePond = vueFilePond(
  FilePondPluginImagePreview,
);

const props = defineProps({
  textFile: {
    type: String,
    default: "Sube una imagen",
  },
});

</script>
<template>
    <file-pond
        class-name="my-pond"
        :label-idle="props.textFile"
        allow-multiple="false"
        class="cursor-pointer text-xs w-1/2"
    />
</template>
<style >
</style>