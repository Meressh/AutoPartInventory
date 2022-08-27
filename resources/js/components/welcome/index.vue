<script setup>
import { useRouter } from "vue-router"

const router = useRouter()

const showCars = () => {
    router.push('/cars');
}

const showParts = () => {
    router.push('/parts');

}
</script>
<template>
    <div class="welcome main-div-holder container">
        <h1>Welcome on this page.</h1>
        <div>
            <button type="button" class="btn btn-info" @click="showCars">Show Cars</button>
            <button type="button" class="btn btn-dark ms-2" @click="showParts">Show Parts</button>
        </div>
    </div>
</template>
