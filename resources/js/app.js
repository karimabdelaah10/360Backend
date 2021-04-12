/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('toast-component', require('./components/ToastComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);

// frontend project components
Vue.component('one_image_l', require('./components/one_image_l.vue').default);
Vue.component('one_image_m', require('./components/one_image_m.vue').default);
Vue.component('one_image_r', require('./components/one_image_r.vue').default);
Vue.component('two_image', require('./components/two_image.vue').default);
Vue.component('two_image_space', require('./components/two_image_space.vue').default);
Vue.component('two_paragraph_m', require('./components/two_paragraph_m.vue').default);
Vue.component('four_image', require('./components/four_image.vue').default);
Vue.component('four_image_space', require('./components/four_image_space.vue').default);
Vue.component('five_image_space', require('./components/five_image_space.vue').default);
Vue.component('six_image_space', require('./components/six_image_space.vue').default);
Vue.component('bg_paragraph_m', require('./components/bg_paragraph_m.vue').default);
Vue.component('bg_title_m', require('./components/bg_title_m.vue').default);
Vue.component('paragraph_l', require('./components/paragraph_l.vue').default);
Vue.component('paragraph_r', require('./components/paragraph_r.vue').default);
Vue.component('slider', require('./components/slider.vue').default);
Vue.component('title_l_pragraph_r', require('./components/title_l_pragraph_r.vue').default);
Vue.component('next-project', require('./components/NextProject').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueObserveVisibility from 'vue-observe-visibility'
import Vuex from 'vuex'
import storeData from "./store/index"

Vue.use(VueObserveVisibility)
Vue.use(Vuex)



const store = new Vuex.Store(
    storeData
)

const app = new Vue({
    el: '#app',
    store,
});

const footer = new Vue({
    el: '#footer',
    store,
});

const header = new Vue({
    el: '#header',
    store,
});

const navigation = new Vue({
    el: '#navigation',
    store,
});
