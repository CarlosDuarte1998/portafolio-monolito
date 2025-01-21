import { defineStore } from 'pinia';
import axios from 'axios';

export const useSkillStore = defineStore('skill', {
    state: () => ({
        dataSkills: [], // Inicializa como un arreglo vacío
        loading: false,
        dataChip: [],
    }),
    actions: {
        // Acción para obtener las habilidades
        async getSkills() {
            this.loading = true;
            try {
                const response = await axios.get('/api/skills');
                this.dataSkills = response.data.data; // Asigna el arreglo completo
            } catch (error) {
                console.error('Error fetching skills:', error);
            } finally {
                this.loading = false;
            }
        },
    },
    getters: {
        // Getters para filtrar habilidades según el tipo
        filterProjects(state) {
            return state.dataSkills.filter((skill) => skill.typeSkill === 2);
        },

        filterExperience(state) {
            return state.dataSkills.filter((skill) => skill.typeSkill === 1);
        },
    },
});
