import { defineStore } from 'pinia';
import { router } from '@inertiajs/vue3';
import axios from 'axios';

export const useAboutMeStore = defineStore('aboutMe', {
    state: () => ({
        name: '',
        bio: '',
        socialLinks: [],
        dataResponse: [],
        loading: false,
    }),
    actions: {
        async fetchAboutMe() {
            this.loading = true;
            try {
                const response = await axios.get('/api/about-me');
                this.dataResponse = response.data;
            } catch (error) {
                console.error('Error fetching about me data:', error);
            }
            this.loading = false;
        },
        async updateAboutMe(data) {
            try {
                axios.put('/api/about-me', data);
                this.fetchAboutMe();
            } catch (error) {
                console.error('Error updating about me data:', error);
            }
        }
    }
});