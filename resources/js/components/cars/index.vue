<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";
import Navigation from "../partials/navigation.vue";

const router = useRouter();

let cars = ref([]);
let filteredData = ref([]);

const getCars = async () => {
    let response = await axios.get("/api/get/cars");

    cars.value = response.data.cars;
    filteredData.value = response.data.cars;
};

const currentData = (carsFiltered) => {
    filteredData.value = carsFiltered;
};

onMounted(async () => {
    getCars();
});
</script>

<template>
    <div class="cars container">
        <navigation
            title="Cars"
            new="car"
            back="/"
            :data="cars"
            @searchData="currentData($event)"
            :searchByCar="false"
        ></navigation>
        <cars-table :cars="filteredData" @getNewCars="getCars()"></cars-table>
    </div>
</template>
