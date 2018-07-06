require('./bootstrap');
// require('./login');
// require('./register');

import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App.vue';
import {routes} from './routes';

// Vue.use(VueAxios, axios);
Vue.use(VueRouter);

const router = new VueRouter({
  routes,
  mode: 'history',
  base: __dirname
});

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

// Vue.component('posts', require('./components/Posts.vue'));
Vue.component('slugWidget', require('./components/slugWidget.vue'));
// Vue.component('navbar', require('./components/Navbar.vue'));
// Vue.component('example', require('./components/ExampleComponent.vue'));
// Vue.component('front-end', require('./components/FrontEnd.vue'));
const app = new Vue({
  el: '#app',
  router,
  render: h => h(App)
});