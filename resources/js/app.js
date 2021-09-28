require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import { routes } from './routes';

import app from './components/app.vue';

Vue.use(VueRouter);
Vue.use(Vuex);

const router = new VueRouter({
    routes,
    mode: 'history',
});

new Vue({
    el: '#app',
    components: {
        app
    },
    router,
});