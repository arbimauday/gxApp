require('../../bootstrap')
window.Vue = require('vue')

import store from './store/store'
import Vue from 'vue'
import routerCar from './router/indexCar'
import routerMotocycle from './router/indexMotorcycle'

import lightbox from 'vlightbox' // gallery images
Vue.use(lightbox)

const car  = new Vue({
    el: '#mainCar',
    store : store,
    router : routerCar
});

const motocycle = new Vue({
    el: '#mainMotorcycle',
    store: store,
    router : routerMotocycle,
});