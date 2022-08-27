<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";

const router = useRouter();

let parts = ref([]);
let filteredData = ref([]);

const getParts = async () => {
    let response = await axios.get("/api/get/parts");

    parts.value = response.data.parts;
    filteredData.value = response.data.parts;
};

const currentData = (carsFiltered) => {
    filteredData.value = carsFiltered;
};

onMounted(async () => {
    getParts();
});
</script>

<template>
    <div class="parts container">
        <navigation
            title="Parts"
            new="part"
            back="/"
            :data="parts"
            @searchData="currentData($event)"
            :searchByCar="true"
        ></navigation>
        <partials-table :parts="filteredData" @getNewParts="getParts()"></partials-table>
    </div>
</template>
