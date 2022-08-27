import { createRouter, createWebHistory } from 'vue-router'
import carsIndex from '../components/cars/index.vue'
import newCar from '../components/cars/new.vue'
import editCar from '../components/cars/edit.vue'
import welcomeIndex from '../components/welcome/index.vue'
import partIndex from '../components/parts/index.vue'
import newPart from '../components/parts/new.vue'
import editPart from '../components/parts/edit.vue'


import notFound from '../components/notFound.vue'

const routes = [{
        path: '/',
        component: welcomeIndex
    },
    {
        path: '/cars',
        component: carsIndex,
    },
    {
        path: '/new/car',
        component: newCar
    },
    {
        path: '/edit/car/:id',
        component: editCar,
        props: true
    },
    {
        path: '/parts',
        component: partIndex
    },
    {
        path: '/new/part',
        component: newPart
    },
    {
        path: '/edit/part/:id',
        component: editPart,
        props: true
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