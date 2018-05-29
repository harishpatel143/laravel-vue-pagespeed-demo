
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('page-speed-component', require('./components/PageSpeedComponent.vue'));
Vue.component('login-component', require('./components/LoginComponent.vue'));
Vue.component('register-component', require('./components/RegisterComponent.vue'));

import VueRouter from 'vue-router';
import Login from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import PageSpeedComponent from './components/PageSpeedComponent.vue';

Vue.use(VueRouter);

const routes = [
    {path: "/login", component: Login},
    {path: "/register", component: RegisterComponent},
    {path: "/api/page-speed", component: PageSpeedComponent},
];

const router = new VueRouter({
    routes,
    mode: "history"
});

const app = new Vue({
    el: '#app',
    router,
});
