require('../../../bootstrap')
window.Vue = require('vue')

import Vue from 'vue'
import VueQrcodeReader from 'vue-qrcode-reader' // screen wrtie barcode
Vue.use(VueQrcodeReader)

let Plat = require('./App.vue');

const app = new Vue({
    el: '#app',
    components:{Plat}
});