/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as vue from "vue";
import * as VueRouter from "vue-router";
import '../css/app.css'
import App from './components/App.vue';
import VueProgressBar from "vue-progressbar";

const app = vue.createApp(App).mount('#app')
import routes from "./routes";

const router = VueRouter.createRouter({
    mode: "history",
    routes,
});
app.use(router);
// Routes End
app.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "3px",
});

