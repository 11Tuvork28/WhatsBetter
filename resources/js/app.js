/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as Vue from "vue";
import * as VueRouter from "vue-router";
import routes from "./routes";
import DropDown from "./components/DropDown.vue";
import ChatRoom from "./components/Chat_room.vue";
import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "test",
    wsHost: "172.23.0.4",
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
});

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes: routes,
});
const app = Vue.createApp({})
    .use(router)
    .component("drop-down-menu", DropDown)
    .component("chat-room", ChatRoom)
    .mount("#app");
