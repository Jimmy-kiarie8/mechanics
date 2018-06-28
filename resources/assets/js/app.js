
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
import StarRating from 'vue-star-rating'
// import VueAxios from 'vue-axios';



// Basic Use - Covers most scenarios
// import { VueEditor } from 'vue2-editor'

// Advanced Use - Hook into Quill's API for Custom Functionality
import { VueEditor, Quill } from 'vue2-editor'
Vue.component('star-rating', StarRating);
Vue.use(VueRouter) 
Vue.use(Vuetify)


// axios.defaults.baseURL = 'http://mechanics.dev/api/getData';

/** 
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('star-rating', VueStarRating.default);
// Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('file-management', require('./components/uploads/FileManagement.vue'));
Vue.component('attachment-list', require('./components/uploads/AttachmentList.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


let myView = require('./components/Dashboard.vue')
// let myView = require('./components/view/View.vue')
let myHeader = require('./components/include/Header.vue')
let myUser = require('./components/users/User.vue')
let myDocs = require('./components/uploads/Docs.vue')
let myProfile = require('./components/users/profile.vue')
let myResume = require('./components/resum/Resume.vue')
let myResumeHome = require('./components/resum/Home.vue')
let myJob = require('./components/jobs/Job.vue')
let mysubsicriber = require('./components/emails/Subscribe.vue');
let myBlog = require('./components/blog/Blog.vue');
let myBlogPost = require('./components/blog/BlogPost.vue');
let myJobRequest = require('./components/jobs/JobsRequest.vue');
let myClient = require('./components/clients/Clients.vue')
let myMechanic = require('./components/mechanics/Mechanic.vue')
// let myLogin = require('./components/Auth/Login.vue');
// let myRegister = require('./components/Auth/Register.vue');

const routes = [
	{path: '/', component: myView},
	{path: '/users', component: myUser},
	{path: '/docs', component: myDocs},
	{path: '/profile', component: myProfile},
	{path: '/resume', component: myResume},
	{path: '/home', component: myResumeHome},
	{path: '/jobs', component: myJob},
    {path: '/clients', component: myClient},
    {path: '/mechanics', component: myMechanic},
	{path: '/subscribers', component: mysubsicriber },
	{path: '/blogs', component: myBlog },
	{path: '/blogpost', component: myBlogPost },
	{path: '/jobRequest', component: myJobRequest },

	// {path: '/register',name: 'register',component: Register,meta: {auth: false}},
    // {path: '/login',name: 'login',component: Login,meta: {auth: false}},
]


/*Vue.use(require('@websanova/vue-auth'), {
  auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
  http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
  router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
})*/

// App.router = Vue.router


const router = new VueRouter({
// mode: 'history',
	routes // short for `routes: routes`
})
const app = new Vue({
    el: '#app',
    router,
    components: {
    	StarRating, myView, myUser, myHeader, myDocs, myProfile, myResume, 
    	myResumeHome, myJob, myClient, mysubsicriber, myBlog, myBlogPost,
    	myJobRequest, myMechanic
    	// , myRegister, myLogin

    }
});
