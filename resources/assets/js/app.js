require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);

Vue.component('slugWidget', require('./components/slugWidget.vue'));

// const app = new Vue({
//     el: '#app'
// });