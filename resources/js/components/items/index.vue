<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";

const router = useRouter();

let items = ref([]);
let filteredData = ref([]);

const getItems = async () => {
    let response = await axios.get("/api/get/items");

    items.value = response.data.items;
    filteredData.value = response.data.items;
};

const currentData = (carsFiltered) => {
    filteredData.value = carsFiltered;
};

onMounted(async () => {
    getItems();
});
</script>

<template>
    <div class="items">
        <navigation
            title="Parts"
            new="item"
            back="/"
            :data="items"
            @searchData="currentData($event)"
        ></navigation>
        <partials-table :items="filteredData" @getNewItems="getItems()"></partials-table>
    </div>
</template>
