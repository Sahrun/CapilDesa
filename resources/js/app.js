/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');
import Vue from 'vue'

import router from './router.js'

import App from './App.vue'

new Vue({
    el: '#app',
    router,
    // store,
    components: {
        App
    }
})