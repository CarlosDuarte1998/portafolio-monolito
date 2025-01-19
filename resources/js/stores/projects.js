import { defineStore } from 'pinia';
import { router } from '@inertiajs/vue3';

export const useProjectStore = defineStore('project', {
    state: () => ({
        projects: [],
        loading: false,
    }),
    actions: {

        async fetchProjects() {
            this.loading = true;
            const response = await axios.get('/api/projects');
            this.projects = response.data;
            this.loading = false;
        },

        
    },
});