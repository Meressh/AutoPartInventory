<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";

let cars = ref([])

const router = useRouter();

const showHome = () => {
    router.push("/");
};

const newCar = () => {
    router.push("/new/car");
};

const editCar = () => {
    router.push("/edit_car");
};

const deleteCar = () => {
    router.push("");
};

onMounted(async () => {
    getCars()
})

const getCars = async () => {
    let response = axios.get("/api/get/cars")
    cars.value = response.data.cars
}

</script>

<template>
    <div class="cars">
        <h2>Cars</h2>
        <button type="button" class="btn btn-dark" @click="showHome">
            Back
        </button>
        <button type="button" class="btn btn-info ms-2" @click="newCar">New</button>
        <table class="table">
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
            <tbody>
                <tr v-for="car in cars" :key="car.id" v-if="cars.length > 0">
                    <th scope="row">Action</th>
                    <td>mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-center text-danger">
                        <span class="cursor-pointer" @click="deleteCar">Delete</span>
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editCar">Edit</span>
                    </td>
                </tr>
                <tr v-if="cars.length <= 0">
                    <td><h3>No Cars</h3></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
