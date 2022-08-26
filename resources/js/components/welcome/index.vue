<script setup>
import { useRouter } from "vue-router"

const router = useRouter()

const showCars = () => {
    router.push('/cars');
}

const showItems = () => {
    router.push('/items');

}
</script>
<template>
    <div class="welcome main-div-holder">
        <h1>Welcom on this page.</h1>
        <div>
            <button type="button" class="btn btn-info" @click="showCars">Show Cars</button>
            <button type="button" class="btn btn-dark ms-2" @click="showItems">Show Items</button>
        </div>
    </div>
</template>
