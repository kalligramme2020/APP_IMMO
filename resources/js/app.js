require('./bootstrap');

window.Vue = require('vue');


import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});



import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Vuex from 'vuex'
Vue.use(Vuex);







// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import dashbord from './components/ExampleComponent.vue';

//gestion des bien -------
import Home from './home/HomeComponent.vue';
import TypeHome from './home/TypeHouseComponent.vue';
import NewHome from './home/NewHouseComponent.vue';
import EtditHome from './home/EditHouseComponent.vue';
import detailHome from './home/detailHouseComponent.vue';

const routes = [
    {
        path: "/",
        component: dashbord
    },
    //gestion des biens ------>
    {
        path: "/home",
        component: Home
    },

    {
      path: "/type-bien",
      component: TypeHome,
    },

    {
        path:"/new-house",
        component: NewHome
    },

    {
        path:"/edit-house",
        name: 'edit',
        component: EtditHome
    },

    {
        path:"/detail-house",
        name: 'details',
        component: detailHome
    }

];

const router = new VueRouter({routes});

 window.Echo.channel('locataire')
    .listen('TenantEvent', (e) => {
        console.log(e);
    });

const app = new Vue({
    el: '#app',
    router : router
});
