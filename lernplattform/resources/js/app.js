require('./bootstrap');
import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './router';
import Vue from 'vue';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

// VueMaterial
import { MdMenu, MdButton, MdList } from 'vue-material/dist/components'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

import WebRTC from 'vue-webrtc'

import store from './store'


window.Vue = require('vue').default;

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.withCredentials = true;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);
Vue.use(WebRTC);
Vue.use(VueToast, {
    // One of the options
    position: 'bottom',
    duration: 3000
  })

Vue.use(VueAxios, axios);
Vue.component('file-upload-component', require('./components/FileUploadComponent.vue').default);
Vue.component('file-view', require('./views/Documents.vue').default);

// VueMaterial
Vue.use(MdMenu)
Vue.use(MdButton)
Vue.use(MdList)

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const checkLogin = (to, from, next) =>{
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!store.getters.isAuthenticated) {
        next({path: '/spa/Login' })
      } else {
        next()
      }

    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
      if (store.getters.isAuthenticated) {
        next({name: '/spa/Dashboard' })
      } else {
        next()
      }

    } else {
      next()
    }

  }

  store.dispatch('checkAuth');

const app = new Vue({
    el: '#app',
    store,
    router: router,
    render: h => h(App),
});
