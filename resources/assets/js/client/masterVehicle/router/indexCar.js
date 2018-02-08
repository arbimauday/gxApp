import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import index from '../views/car.vue'
import addVehicle from '../components/addVehicle.vue'
import viewDetail from '../components/viewDetail.vue'
import galleryImg from '../components/galleryImg.vue'

const router = new VueRouter({
    routes: [
        { path: '/', component: index },
        { path: '/addVehicle', component: addVehicle },
        { path: '/viewDetail/:id/:plateNumber', component: viewDetail },
        { path: '/viewDetail/galleryImg/:id/:plateNumber', component: galleryImg}
    ]
})

export default router