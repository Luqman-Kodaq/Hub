require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from './routes';
import App from './App.vue';

Vue.use(VueRouter);

// Vue.use(VueAxios, axios);

let router = new VueRouter({
  routes,
  mode: 'history',
  base: __dirname
});

router.beforeEach((to, from, next) => {
  // Check for requiresAuth Guard
  if (to.matched.some(record => record.meta.requiresAuth)){
          let credentials = JSON.parse(localStorage.getItem('credentials'));
          let token = credentials.data.token;
    // Check if NOT Logged In
        if (token == null) {
          // Go to Log In
          next({
            path: '/login',
            params: { nextUrl: to.fullPath }
          })
        } else {
          // Check If Admin or User
           let user = JSON.parse(localStorage.getItem('credentials'))
          let token = user.data.credentials;
          if (to.matched.some(record => record.meta.admin)) {
            // If Admin
            if (token.admin == 1) {
              // Go to Admin Dashboard
              next();
            } else {
              next({ name: 'Home'})
            }
          } else if (to.matched.some(record => record.meta.user)) {
            // If User
            if (token.admin == 0) {
              // Go to HomePage
              next()
            } else {
              next({ name: 'Admin'})                
            }
          } else {
            next();
          }
        }
  } else if (to.matched.some(record => record.meta.requiresGuest)) {
    // Check for requiresGuest Guard
    // Check if already Logged In
    if (localStorage.getItem('credentials') != null) {
        // Go to Home page
    next({
      path: '/',
      query: {
        redirect: to.fullPath
      }
    });
    } else {
      // Proceed to route
      next();
    }
  } else {
    // Proceed to route
    next();
  }
});

Vue.component('slugWidget', require('./components/slugWidget.vue'));

const app = new Vue({
  el: '#app',
  router,
  render: h => h(App)
});