import axios from 'axios';
window.axios = axios;

// Add this to your app.js or where you configure Axios
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
