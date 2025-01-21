<script setup>
import { ref, onMounted, watch } from "vue";
import { AutoComplete, Button } from "primevue";
import { router } from "@inertiajs/vue3";
import { defineProps } from "vue";



const props=defineProps({
    dataSkill: Array,
});


// Simulamos los datos del servicio
const mockCountries = [
    { name: "United States", code: "US" },
    { name: "Canada", code: "CA" },
    { name: "Mexico", code: "MX" },
    { name: "Brazil", code: "BR" },
    { name: "United Kingdom", code: "GB" },
    { name: "Germany", code: "DE" },
    { name: "France", code: "FR" },
    { name: "Italy", code: "IT" },
    { name: "Spain", code: "ES" },
    { name: "Australia", code: "AU" },
];

const getCountries = () => {
    return new Promise((resolve) => {
        setTimeout(() => resolve(mockCountries), 500);
    });
};

onMounted(() => {
    getCountries().then((data) => (countries.value = data));
});




const countries = ref([]);
const selectedCountry = ref();
const filteredCountries = ref([]);

const search = (event) => {
    setTimeout(() => {
        if (!event.query.trim().length) {
            filteredCountries.value = [...countries.value];
        } else {
            filteredCountries.value = countries.value.filter((country) => {
                return country.name.toLowerCase().startsWith(event.query.toLowerCase());
            });
        }
    }, 250);
};
</script>


<template>
    <div class="card flex justify-center">
        <AutoComplete v-model="selectedCountry" placeholder="Seleccione la skill" optionLabel="name" :suggestions="filteredCountries" @complete="search">
            <template #option="slotProps">
                <div class="flex items-center">
                 
                    <div class=" text-green-900">{{ slotProps.option.name }}</div>
                </div>
            </template>
            <template #header>
                <div class="font-medium px-3 py-2">
                    <span>Skills disponibles</span>
                </div>
            </template>
            <template #footer>
                <div class="px-3 py-3">
                    <Button  label="Añadir nueva skill" fluid severity="secondary" text size="small" icon="pi pi-plus" />
                </div>
            </template>
        </AutoComplete>
    </div>
</template>

