import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import index from '../mainData.vue'
import failedJobs from '../views/failedJobs.vue'

const router = new VueRouter({
    routes : [
        {path: '/', component : index},
        {path: '/failedJobs', component: failedJobs}
    ]
})

export default router