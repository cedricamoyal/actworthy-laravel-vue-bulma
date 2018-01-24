// load all dependencies
import axios from 'axios';

window.Vue = require('vue');
window.axios = axios;

// load all components
Vue.component('guest-list', require('./components/Guest-list.vue'));

// define new Vue instances
const app = new Vue({
    el: '#app'
});
