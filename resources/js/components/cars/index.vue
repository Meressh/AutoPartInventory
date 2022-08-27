<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";

let cars = ref([]);
let search = ref({
    filter: "",
});

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

onMounted(async () => {
    getCars();
});

const filteredList = () => {
    console.log(search)
    return cars.value.filter((car) =>
        car.name.toLowerCase().includes(search.value.filter.toLowerCase())
    );
};

const getCars = async () => {
    let response = await axios.get("/api/get/cars");

    cars.value = response.data.cars;
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
        <div class="d-flex justify-content-between align-items-end">
            <div class="d-flex flex-column">
                <h2>Cars</h2>
                <div>
                    <button
                        type="button"
                        class="btn btn-dark"
                        @click="showHome"
                    >
                        Back
                    </button>
                    <button
                        type="button"
                        class="btn btn-info ms-2"
                        @click="newCar"
                    >
                        New
                    </button>
                </div>
            </div>
            <div>
                <input
                    type="text"
                    class="form-control"
                    id="search"
                    v-model="search.filter"
                    placeholder="Search by name"
                    required
                />
            </div>
        </div>
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
                <tr v-for="car in filteredList()" :key="car.id">
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
