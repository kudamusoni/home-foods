import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { createApp } from 'vue'
const app = createApp({})
app.mount('#app')
