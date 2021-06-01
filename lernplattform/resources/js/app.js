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

// Components
import Nav from './components/Nav.vue';


window.Vue = require('vue').default;

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.withCredentials = true;


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
Vue.component('Nav', Nav);

// VueMaterial
Vue.use(MdMenu)
Vue.use(MdButton)
Vue.use(MdList)

// VueMoment
const moment = require('moment')
require('moment/locale/de')
Vue.use(require('vue-moment'), {
    moment
})


const router = new VueRouter({
    mode: 'history',
    routes: routes
});

router.beforeEach(async (to, from, next) => {
	if (to.matched.some(record => record.meta.requiresAuth)) {
	  // this route requires auth, check if logged in
	  // if not, redirect to login page.
        if (store.state.user === null) {
            if(await getUserData() === false){
                next({
                    path: '/spa/login',
                });
            }
        }


      next();
	} else {
	  next()
	}
});

async function getUserData(){
    return await axios.get('/api/authuser').then(async response => {
        store.dispatch('setUser', {
           user: response.data
        });
    })
    .catch(error => {
        return false;
    });
}

const app = new Vue({
    el: '#app',
    store,
    router: router,
    render: h => h(App),
});
