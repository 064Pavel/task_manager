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
            path: '/profile',
            name: 'profile',
            component: () => import('../views/vue-components/task-manager/ProfileComponent.vue'),
        },
        {
            path: '/tasks/category/:category_id',
            name: 'tasks.index',
            props: true,
            component: () => import('../views/vue-components/task-manager/task/IndexComponent.vue'),
        },
        {
            path: '/tasks/create',
            name: 'tasks.create',
            props: true,
            component: () => import('../views/vue-components/task-manager/task/CreateComponent.vue')

        },
        {
            path: '/category/:category_id/tasks/:task_id',
            name: 'tasks.show',
            props: true,
            component: () => import('../views/vue-components/task-manager/task/EditComponent.vue')

        },

    ]
})


router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')

    if (!token) {
        if (to.name === 'login' || to.name === 'register' || to.name === 'homepage') {
            return next()
        } else {
            return next({
                name: 'login'
            })
        }
    }

    if (to.name === 'login' || to.name === 'register' || to.name === 'homepage' && token) {
        return next({
            name: 'profile'
        })
    }

    next()

})


export default router
