require('../../../bootstrap')
window.Vue = require('vue')

import Vue from 'vue'
import router from './router/mainRouter'
let Maindata = require('./mainData');

const app = new Vue({
    el: '#appData',
    router: router,
    components:{Maindata}
})