import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [

        {
            path: '/',
            name: 'homepage',
            component: () => import('../views/vue-components/HomepageComponent.vue')
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('../views/vue-components/auth/LoginComponent.vue')
        },
        {
            path: '/register',
            name: 'register',
            component: () => import('../views/vue-components/auth/RegisterComponent.vue')
        },

    ]
})

export default router
