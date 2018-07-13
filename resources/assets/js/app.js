window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

require('./bootstrap');
// require('./login');
// require('./register');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './App.vue';
import {routes} from './routes';

// Vue.use(VueAxios, axios);

const router = new VueRouter({
  routes,
  mode: 'history',
  base: __dirname
});

const app = new Vue({
  el: '#app',
  render: h => h(App),
  router
});

Vue.component('slugWidget', require('./components/slugWidget.vue'));