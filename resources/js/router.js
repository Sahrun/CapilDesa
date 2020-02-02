//IMPORT SECTION
import Vue from 'vue'
import Router from 'vue-router'
// import store from './store.js'
import Dashboard from './pages/dashboard.vue'
import Religion from './pages/religion/index.vue'

Vue.use(Router)

//DEFINE ROUTE
const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard,
            // meta: { requiresAuth: true }
        },
        {
            path:'/religion',
            name:'index',
            component:Religion
        }
    ]
});

//Navigation Guards
// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         let auth = store.getters.isAuth
//         if (!auth) {
//             next({ name: 'login' })
//         } else {
//             next()
//         }
//     } else {
//         next()
//     }
// })

export default router