<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue"
import { axios } from "axios"
import { toStatement } from "@babel/types";

const router = useRouter();

const showCars = () => {
    router.push("/cars");
};

let form = ref({
    name: '',
    registration_number: '',
    is_registered: '',
})

const saveCar = () => {
    const formData = new FormData()

    formData.append('name', form.value.name)
    formData.append('registration_number', form.value.registration_number)
    formData.append('is_registered', form.value.is_registered)

    axios.post("/api/add/cars", formData)
    .then((response) => {
        form.value.name = '',
        form.value.registration_number = ''
        form.value.is_registered = ''

        router.push('/cars')

        toast.fire({
            icon: "success",
            title: "Car was added successfully"
        })
    })
    .catch((error) => {

    })

}
</script>

<template>
    <div class="cars">
        <h2>Add Car</h2>
        <button type="button" class="btn btn-dark" @click="showCars">
            Back
        </button>
        <form>
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
                <label for="registration_number" class="form-label"
                    >Registration number <span class="text-danger">{{ form.is_registered ? '*' : '' }}</span></label
                >
                <input
                    type="password"
                    class="form-control"
                    id="registration_number"
                    v-model="form.registration_number"
                />
            </div>
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1"
                    @click="form.is_registered = !form.is_registered"
                />
                <label class="form-check-label" for="is_registered"
                    >Is registered?</label
                >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
