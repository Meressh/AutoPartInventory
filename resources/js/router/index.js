import { createRouter, createWebHistory } from 'vue-router'
import carsIndex from '../components/cars/index.vue'
import newCar from '../components/cars/new.vue'
import editCar from '../components/cars/edit.vue'
import welcomeIndex from '../components/welcome/index.vue'
import itemIndex from '../components/items/index.vue'
import newItem from '../components/items/new.vue'
import editItem from '../components/items/edit.vue'


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
        path: '/edit_car',
        component: editCar
    },
    {
        path: '/items',
        component: itemIndex
    },
    {
        path: '/new/item',
        component: newItem
    },
    {
        path: '/edit/item',
        component: editItem
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