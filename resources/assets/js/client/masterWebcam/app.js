require('../../bootstrap')
window.Vue = require('vue')

import Vue from 'vue'
import routerBarcode from './router/main'
import routerScanface from './router/scanFaceurl'

const app = new Vue({
    el : '#dataBarcode',
    router: routerBarcode
})

const appScanFace = new Vue({
    el: '#scanFace',
    router: routerScanface
})