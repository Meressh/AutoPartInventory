<script setup>
import { useRouter } from "vue-router";
import { onMounted,ref } from "vue"
import axios from "axios"

const router = useRouter();
const props = defineProps({
    id: {
        type: String,
        default: ''
    }
})

const showCars = () => {
    router.push("/cars");
};

let form = ref({
    name: '',
    registration_number: '',
    is_registered: '',
})

let errorMessage = ref({
    errors: {}
});

onMounted(async () => {
    getCar()
})

const getCar = async () => {
    let response = await axios.get(`/api/get/car/${props.id}`)

    form.value.name = response.data.car.name
    form.value.registration_number = response.data.car.registration_number
    form.value.is_registered = response.data.car.is_registered == "1" ? true : false
}

const updateCar = () => {
    if((form.value.is_registered == "1") && !form.value.registration_number){
        toast.fire({
            icon: "error",
            title: "Registration number is required!"
        })
        return;
    }
    const formData = new FormData()

    formData.append('name', form.value.name)
    formData.append('registration_number', form.value.registration_number)
    formData.append('is_registered', form.value.is_registered)


    axios.post("/api/update/car/" + props.id, formData)
    .then((response) => {
        form.value.name = '',
        form.value.registration_number = ''
        form.value.is_registered = ''

        router.push('/cars')

        toast.fire({
            icon: "success",
            title: "Car was updated successfully"
        })
    })
    .catch((error) => {
        errorMessage.value.errors = error.response.data.errors
        toast.fire({
            icon: "error",
            title: "Some errors was made!"
        })
    })

}
</script>

<template>
    <div class="cars">
        <h2>Edit Car: </h2>
        <button type="button" class="btn btn-dark" @click="showCars">
            Back
        </button>
        <form @submit.prevent="updateCar">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label"
                    >Name <span class="text-danger">*</span></label
                >
                <div class="text-danger error-message fw-bold" v-if="errorMessage.errors.name">
                    {{ errorMessage.errors.name[0] }}
                </div>
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
                <label for="registration_number" class="form-label"
                    >Registration number <span class="text-danger">{{ form.is_registered ? '*' : '' }}</span></label
                >
                <div class="text-danger error-message fw-bold" v-if="errorMessage.errors.registration_number">
                    {{ errorMessage.errors.registration_number[0] }}
                </div>
                <input
                    type="number"
                    class="form-control"
                    id="registration_number"
                    v-model="form.registration_number"
                />
            </div>
            <div class="mb-3 form-check">
                <div class="text-danger error-message fw-bold" v-if="errorMessage.errors.is_registered">
                    {{ errorMessage.errors.is_registered[0] }}
                </div>
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1"
                    v-model="form.is_registered"
                />
                <label class="form-check-label" for="is_registered"
                    >Is registered?</label
                >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
