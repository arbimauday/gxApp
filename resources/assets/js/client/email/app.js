require('../../bootstrap')
window.Vue = require('vue')

import Vue from 'vue'
import router from './router/index'

const app = new Vue({
    el: '#appEmail',
    router: router
})