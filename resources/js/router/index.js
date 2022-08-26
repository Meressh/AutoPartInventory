import { createRouter, createWebHistory } from 'vue-router'
import carsIndex from '../components/cars/index.vue'
import welcomeIndex from '../components/welcome/index.vue'
import itemIndex from '../components/items/index.vue'
import notFound from '../components/notFound.vue'

const routes = [{
        path: '/',
        component: welcomeIndex
    },
    {
        path: '/cars',
        component: carsIndex
    },
    {
        path: '/items',
        component: itemIndex
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router