/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as Vue from "vue";
import * as VueRouter from "vue-router";
import routes from "./routes";
import DropDown from './components/DropDown.vue';
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes: routes,
});
const app = Vue.createApp({}).use(router).component('drop-down-menu',DropDown).mount('#app');
