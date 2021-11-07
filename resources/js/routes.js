export default [
    {
        path: "/dashboard",
        component: require("./components/App.vue").default,
    },
    {
        path: "*",
        component: require("./components/ExampleComponent.vue").default,
    },
];
