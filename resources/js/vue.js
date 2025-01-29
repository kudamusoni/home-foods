import { createApp } from 'vue'

import './bootstrap';
import '../css/app.css';

import Choose from './pages/Choose.vue'
import Home from './pages/Home.vue'
import UserRegister from './pages/UserRegister.vue'
import CompanyChoose from './pages/CompanyChoose.vue'
import CompanyCreate from './pages/CompanyCreate.vue'
import Dashboard from './pages/admin/Dashboard.vue'
import Products from './pages/admin/Products.vue'
import Product from './pages/Product.vue'
import ProductCreate from './pages/admin/ProductCreate.vue'

const app = createApp({});

app
    .component('home', Home)
    .component('choose', Choose)
    .component('user-register', UserRegister)
    .component('company-choose', CompanyChoose)
    .component('company-create', CompanyCreate)
    .component('dashboard', Dashboard)
    .component('products', Products)
    .component('product', Product)
    .component('product-create', ProductCreate)

app.mount('#app')
