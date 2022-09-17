import * as VueRouter from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Home',
        alias: '/home',
        component: () => import('../views/Home.vue'),
        // beforeEnter: (to, from, next) => {
        //     if (localStorage.getItem('token')) {
        //         next()
        //     } else {
        //         next('/login')
        //     }
        // }
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('../views/Login.vue'),
        meta: {
            hideNavBar: true
        }
    },
    {
        path: '/todo/:todoId',
        name: 'Todo',
        component: () => import('../views/Todo.vue')
    },
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(import.meta.env.VITE_HOST_URL_BASE),
    routes
})

export default router
