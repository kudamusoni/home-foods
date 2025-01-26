import { createApp } from 'vue'

import './bootstrap';
import '../css/app.css';

import Choose from './pages/Choose.vue'
import Home from './pages/Home.vue'
import UserRegister from './pages/UserRegister.vue'
import CompanyChoose from './pages/CompanyChoose.vue'

const app = createApp({});

app
    .component('home', Home)
    .component('choose', Choose)
    .component('user-register', UserRegister)
    .component('company-choose', CompanyChoose)

app.mount('#app')
