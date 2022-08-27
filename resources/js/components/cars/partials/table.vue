<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";

const router = useRouter();

const props = defineProps({
    cars: {
        type: Object,
        default: {},
    },
});

const emit = defineEmits({
    getNewCars: {
        type: Boolean,
        default: false,
    },
});

const editCar = (id) => {
    router.push("/edit/car/" + id);
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

                    emit("getNewCars", true);
                })
                .catch((error) => {
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
            <tr v-for="car in cars" :key="car.id">
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
</template>
