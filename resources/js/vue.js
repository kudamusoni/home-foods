import { createApp } from 'vue'

import './bootstrap';
import '../css/app.css';

import Choose from './pages/Choose.vue'
import Home from './pages/Home.vue'
import UserRegister from './pages/UserRegister.vue'
import CompanyChoose from './pages/CompanyChoose.vue'
import CompanyCreate from './pages/CompanyCreate.vue'
import CompanyJoin from './pages/CompanyJoin.vue'
import Dashboard from './pages/admin/Dashboard.vue'
import Products from './pages/admin/Products.vue'
import Product from './pages/Product.vue'
import ProductCreate from './pages/admin/ProductCreate.vue'
import ProductEdit from './pages/admin/ProductEdit.vue'
import Users from './pages/admin/Users.vue'
import UserEdit from './pages/admin/UserEdit.vue'
import Invite from './pages/admin/Invite.vue'

const app = createApp({});

app
    .component('home', Home)
    .component('choose', Choose)
    .component('user-register', UserRegister)
    .component('company-choose', CompanyChoose)
    .component('company-create', CompanyCreate)
    .component('company-join', CompanyJoin)
    .component('dashboard', Dashboard)
    .component('products', Products)
    .component('product', Product)
    .component('product-create', ProductCreate)
    .component('product-edit', ProductEdit)
    .component('users', Users)
    .component('user-edit', UserEdit)
    .component('invite', Invite)

app.mount('#app')
