require('../../../bootstrap')
window.Vue = require('vue')

import Vue from 'vue'

let index = require('./views/Index.vue');

const app = new Vue({
    el: "#appVueScrolling",
    components: {index}
});
