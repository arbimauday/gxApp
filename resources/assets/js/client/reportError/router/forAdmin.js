import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import index from '../views/Admin.vue'

const router = new VueRouter({
    routes: [
        {path : '/',component : index}
    ]
})

export default router