import './bootstrap';
import '../css/app.css';
import '../css/style.css';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createPinia } from 'pinia';

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core';
//import alls icons from fontawesome
import { faFilePdf, faShare, faX, prefix } from '@fortawesome/free-solid-svg-icons';
import {  } from '@fortawesome/free-regular-svg-icons';
import { faFacebook, faGithub, faInstagram, faLinkedin, faSquareXTwitter, faXTwitter, faYoutube } from '@fortawesome/free-brands-svg-icons';

import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';



library.add(
    faSquareXTwitter,
    faXTwitter,
    faGithub,
    faInstagram,
    faYoutube,
    faLinkedin,
    faFacebook,
    faFilePdf,
    faShare
    
);

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('fa', FontAwesomeIcon)
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                    
                    options: {
                        cssLayer: {
                            name: 'primevue',
                            order: 'tailwind-base, primevue, tailwind-utilities'
                        },
                        darkModeSelector: false || 'none',
                    }
                }
             })
            .use(createPinia())
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
