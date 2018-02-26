require('./bootstrap');
window.Vue = require('vue');

import store from './store'; // Vuex
import Vue from 'vue'; // scrolling js
import VueRouter from 'vue-router'; // scrolling router
Vue.use(VueRouter);


/*-------------------------------------------------------------------*/
// report
// let For_admin = require('./components/pages/report_error/For_admin'); // report view to admin
// let User_report = require('./components/pages/report_error/User_report'); // report view to user
//
// // Master vehicle
// let car = require('./components/pages/masterVehicle/Car');
// let motorcycle = require('./components/pages/masterVehicle/Motorcycle');
// let addVehicle = require('./components/pages/masterVehicle/addVehicle');
// /*-------------------------------------------------------------------*/
//
// /*-------------------------------------------------------------------*/
// // SETTING ROUTING
// // const routes = [
// //     {
// //         path: '/',
// //         name: 'car',
// //         component: car
// //     },
// //     {
// //         path: '/',
// //         name: 'motorcycle',
// //         component: motorcycle
// //     },
// //     {
// //         path: '/addVehicle',
// //         name: 'addVehicle',
// //         component: addVehicle
// //     }
// // ];
//
// // const router = new VueRouter({
// //     routes
// // });
//
// /*-------------------------------------------------------------------*/
// // PASSING RUNNING METHOD ANOTHER FILE
// let EventBus = new scrolling();
// Object.defineProperties(scrolling.prototype, {
//     $bus: {
//         get:function () {
//             return EventBus;
//         }
//     }
// });
// /*-------------------------------------------------------------------*/
//
// const app = new scrolling({
//     el: '#app',
//     //router,
//     store,
//     components: {For_admin,User_report,car,motorcycle}
// });
