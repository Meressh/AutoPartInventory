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

const editCar = (id) => {
    router.push("/edit/car/" + id);
};

const deleteCar = (id) => {
    router.push("/delete/car/" + id);
};

onMounted(async () => {
    getCars()
})

const getCars = async () => {
    let response = await axios.get("/api/get/cars")
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
            <tbody>
                <tr v-for="car in cars" :key="car.id" v-if="cars.length > 0">
                    <th scope="row">Action</th>
                    <td>{{ car.name }}</td>
                    <td>{{ car.registration_number }}</td>
                    <td>{{ car.is_registered == "0" ? "NO" : "YES"}} </td>
                    <td class="text-center text-danger">
                        <span class="cursor-pointer" @click="deleteCar(car.id)">Delete</span>
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editCar(car.id)">Edit</span>
                    </td>
                </tr>
                <tr v-else>
                    <td><h3>No Cars</h3></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
