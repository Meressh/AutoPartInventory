<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";
import Navigation from "../partials/navigation.vue";

const router = useRouter();

let cars = ref([]);
let filteredData = ref([]);

const editCar = (id) => {
    router.push("/edit/car/" + id);
};

const currentData = (carsFiltered) => {
    filteredData.value = carsFiltered
};

onMounted(async () => {
    getCars();
});

const getCars = async () => {
    let response = await axios.get("/api/get/cars");

    cars.value = response.data.cars;
    filteredData.value = response.data.cars


};
const deleteCar = (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You cant undo this",
        icon: "warning",
        confirmButtonColor: "#4595d1",
        cancelButtonText: "#000",
        confirmButtonText: "Delete Car",
    }).then((result) => {
        if (result.value) {
            axios
                .post("/api/delete/car/" + id)
                .then((response) => {
                    toast.fire({
                        icon: "success",
                        title: "Car was successfully deleted",
                    });

                    getCars();
                })
                .catch((error) => {
                    console.log(error);

                    toast.fire({
                        icon: "error",
                        title: "Some errors was made!",
                    });
                });
        }
    });
};
</script>

<template>
    <div class="cars">
        <navigation new="car" back="/" :cars="cars" @searchData="currentData($event)"></navigation>
        <table class="table" v-cloak>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Registration N.</th>
                    <th scope="col">Registered</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody v-if="cars.length > 0">
                <tr v-for="car in filteredData" :key="car.id">
                    <th scope="row">Action</th>
                    <td>{{ car.name }}</td>
                    <td>{{ car.registration_number }}</td>
                    <td>{{ car.is_registered == "0" ? "NO" : "YES" }}</td>
                    <td class="text-center text-danger">
                        <span class="cursor-pointer" @click="deleteCar(car.id)"
                            >Delete</span
                        >
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editCar(car.id)"
                            >Edit</span
                        >
                    </td>
                </tr>
            </tbody>
            <tr v-else>
                <td><h3>No Cars</h3></td>
            </tr>
        </table>
    </div>
</template>
