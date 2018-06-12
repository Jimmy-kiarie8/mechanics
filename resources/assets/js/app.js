
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'

Vue.use(VueRouter) 
Vue.use(Vuetify)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

let myView = require('./components/view/View.vue')
let myHeader = require('./components/include/Header.vue')
let myUser = require('./components/users/User.vue')

const routes = [
	{path: '/', component: myView},
	{path: '/users', component: myUser},
]
const router = new VueRouter({
// mode: 'history',
	routes // short for `routes: routes`
})
const app = new Vue({
    el: '#app',
    router,
    components: {
    	myView, myUser, myHeader
    }
});
