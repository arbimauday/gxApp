// require('../../bootstrap')
// window.Vue = require('vue')

//import Vue from 'vue'

// admin
//import routerAdmin from './router/forAdmin'
//import mainViewAdmin from './views/Admin.vue'
// let mainViewAdmin = require('./views/Admin.vue');
//
// const rte  = new Vue({
//     el: '#reportAdmin',
//     //routerAdmin,
//     components:{mainViewAdmin}
// })

// user
// import routerUser from './router/forUser'
// import mainViewUser from './views/User.vue'
// const reportUser = new Vue({
//     el : '#reportUser',
//     routerUser,
//     components:{mainViewUser}
// })



require('../../bootstrap')
window.Vue = require('vue')

import Vue from 'vue'

// admin
import routeradmin from './router/forAdmin'
import routerreportuser from './router/forUser'
let Maindataview = require('./views/Admin.vue');
const app = [
    new Vue({
        el: '#reportAdmin',
        router : routeradmin,
        components:{Maindataview}
    }),
    new Vue({
        el: '#reportUser',
        router : routerreportuser,
        //components:{Maindataview}
    })
];


// user
//
// const app2 = new Vue({
//     el: '#reportUsser',
//     router : routeruser,
// })