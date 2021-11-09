/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import moment from "moment";
import '../sass/app.css'
import { Form, HasError, AlertError } from "vform";
window.Form = Form;

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

import Swal from "sweetalert2";

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});
window.Swal = Swal;
window.Toast = Toast;

import VueProgressBar from "vue-progressbar";
Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "3px",
});

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

/**
 * Routes imports and assigning
 */
import VueRouter from "vue-router";
Vue.use(VueRouter);
import routes from "./routes";

const router = new VueRouter({
    mode: "history",
    routes,
});
// Routes End

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Components
Vue.component("pagination", require("laravel-vue-pagination"));
Vue.component("app", require("./components/App.vue"));
// Filter Section

Vue.filter("myDate", function (created) {
    return moment(created).format("MMMM Do YYYY");
});

Vue.filter("yesno", (value) =>
    value
        ? '<i class="fas fa-check green"></i>'
        : '<i class="fas fa-times red"></i>'
);

// end Filter

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue")
);

const app = new Vue({
    el: "#app",
    router,
});
