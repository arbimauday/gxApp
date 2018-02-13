require('../../../bootstrap')
window.Vue = require('vue')

import Vue from 'vue'
import Maindata from './appData.vue';

const app = new Vue({
    el: '#app',
    components:{Maindata}
})