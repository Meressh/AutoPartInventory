<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";
import axios from "axios";
import { toStatement } from "@babel/types";

const router = useRouter();
const props = defineProps({
    id: {
        type: String,
        default: ''
    }
})

const showParts = () => {
    router.push("/parts");
};

let form = ref({
    name: "",
    serialnumber: "",
    car_id: "",
});

let errorMessage = ref({
    errors: {},
});

let cars = ref({});

onMounted(async () => {
    getCars()
    getPart()
});

const getPart = async () => {
    let response = await axios.get(`/api/get/part/${props.id}`)
    form.value.name = response.data.part.name
    form.value.serialnumber = response.data.part.serialnumber
    form.value.car_id = response.data.part.car_id
}

const getCars = async () => {
    let response = await axios.get("/api/get/cars");
    cars.value = response.data.cars;
};

const checkIfActive = (id) => {
    if(id == form.value.car_id){
        form.value.car_id = null;
    }else{
        form.value.car_id = id
    }
};

const updatePart = () => {
    const formData = new FormData();

    formData.append("name", form.value.name);
    formData.append("serialnumber", form.value.serialnumber);
    formData.append("car_id", form.value.car_id);

    axios
        .post("/api/update/part/" + props.id, formData)
        .then((response) => {
            form.value.name = "";
            form.value.serialnumber = "";
            form.value.car_id = "";

            router.push("/parts");

            toast.fire({
                icon: "success",
                title: "Part was updated successfully",
            });
        })
        .catch((error) => {
            errorMessage.value.errors = error.response.data.errors;
            toast.fire({
                icon: "error",
                title: "Some errors was made!",
            });
        });
};
</script>
<template>
    <div class="parts">
        <h2>New Part</h2>
        <button type="button" class="btn btn-dark" @click="showParts">
            Back
        </button>
        <form @submit.prevent="updatePart">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label"
                    >Name <span class="text-danger">*</span></label
                >
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    aria-describedby="emailHelp"
                    v-model="form.name"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="serialnumber" class="form-label"
                    >Serial number <span class="text-danger">*</span></label
                >
                <input
                    type="number"
                    class="form-control"
                    id="serialnumber"
                    v-model="form.serialnumber"
                    required
                />
            </div>
                <label for="serialnumber" class="form-label"
                    >Pick Car</label
                >
                <div class="list-group mb-3" v-if="cars.length > 0">
                    <button
                        type="button"
                        class="list-group-item list-group-item-action"
                        v-for="car in cars"
                        :key="car.id"
                        :class="{ active: car.id == form.car_id }"
                        aria-current="true"
                        @click="checkIfActive(car.id)"
                    >
                        {{ car.name }} || {{ car.registration_number ? car.registration_number : "No registration number" }}
                    </button>
                </div>
                <p v-else>Not Found</p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
