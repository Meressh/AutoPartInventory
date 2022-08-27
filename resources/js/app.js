import './bootstrap';
import { createApp } from "vue"
import router from './router'
import App from "./components/App.vue"

import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/dist/sweetalert2.css'


// Import coponents
import searchFilter from './components/partials/search'
import navigation from './components/partials/navigation'

import carsTable from './components/cars/partials/table.vue'
import partialsTable from './components/items/partials/table.vue'

// Add notifications to app
window.Swal = Swal;
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timeProgressBar: true,
})
window.toast = toast;

// Create app
const app = createApp(App)

// Register components
app.component('search-filter', searchFilter)
app.component('navigation', navigation)
app.component('cars-table', carsTable)
app.component('partials-table', partialsTable)

// Mount App
app.use(router).mount("#app")