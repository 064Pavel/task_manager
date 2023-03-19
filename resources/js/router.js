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
        {
            path: '/task-manager',
            name: 'task-manager',
            component: () => import('../views/vue-components/task-manager/TaskManager.vue')
        },
        {
            path: '/tasks/create',
            name: 'tasks.create',
            component: () => import('../views/vue-components/task-manager/task/CreateComponent.vue')
        },
    ]
})


router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')

    if (!token){
        if (to.name === 'login' || to.name === 'register' || to.name === 'homepage'){
            return next()
        } else {
            return next({
                name: 'login'
            })
        }
    }

    if (to.name === 'login' || to.name === 'register' || to.name === 'homepage' && token){
        return next({
            name: 'task-manager'
        })
    }

    next()

})


export default router
