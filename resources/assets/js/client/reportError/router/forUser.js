import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//import index from '../views/Admin.vue'
import index from '../views/User.vue'
import form from '../components/Formreport.vue'

const router = new VueRouter({
    routes: [
        {path : '/',component : index},
        {path : '/formReport', component : form}
    ]
})

export default router