require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './App.vue';
import FrontEnd from './components/FrontEnd.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

const routes = [
  {
      name: 'FrontEnd',
      path: '/posts',
      component: FrontEnd
  }
];

const router = new VueRouter({mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');

Vue.component('slugWidget', require('./components/slugWidget.vue'));
// Vue.component('navbar', require('./components/navbar.vue'));
// Vue.component('example', require('./components/ExampleComponent.vue'));
// Vue.component('front-end', require('./components/FrontEnd.vue'));

// const app = new Vue({
//     el: '#app',
//     data: {
//         posts: []
//     },
//     methods: {},            
//     created() {
//         axios.get('posts').then(response => {
//           console.log(response);
//         });
//       }   
// });