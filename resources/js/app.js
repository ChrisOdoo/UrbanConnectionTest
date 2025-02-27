import './bootstrap';
import { createApp } from 'vue';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import StockUpdated from './components/StockUpdated.vue';

window.Pusher = Pusher;

if (!import.meta.env.VITE_PUSHER_APP_KEY || !import.meta.env.VITE_PUSHER_APP_CLUSTER) {
    console.error('Las variables de entorno para Pusher no están definidas.');
} else {
  

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: "2ee43bb2b0a30b1d70d6",
        cluster: "us2",
        wsHost: "ws-us2.pusher.com",
        wsPort: 443,
        wssPort: 443,
        forceTLS: true,
        enabledTransports: ['ws', 'wss']
    });

    console.log('Laravel Echo inicializado:', window.Echo);
}


const app = createApp({});
app.component('stock-updated', StockUpdated);
app.mount('#app');

    