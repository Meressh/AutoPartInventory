<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue"
import { axios } from "axios"
import { toStatement } from "@babel/types";

const router = useRouter();

const showItems = () => {
    router.push("/items");
};

let form = ref({
    name: '',
    serialnumber: '',
    car_id: '',
})

const saveCar = () => {
    const formData = new FormData()

    formData.append('name', form.value.name)
    formData.append('serialnumber', form.value.serialnumber)
    formData.append('car_id', form.value.car_id)

    axios.post("/api/add/items", formData)
    .then((response) => {
        form.value.name = '',
        form.value.serialnumber = ''
        form.value.car_id = ''

        router.push('/items')

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
    <div class="items">
        <h2>New Item</h2>
        <button type="button" class="btn btn-dark" @click="showItems">
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
                <label for="serialnumber" class="form-label"
                    >Serial number <span class="text-danger">*</span></label
                >
                <input
                    type="password"
                    class="form-control"
                    id="serialnumber"
                    v-model="form.serialnumber"
                />
            </div>
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1"
                    @click="form.car_id = !form.car_id"
                />
                <label class="form-check-label" for="car_id"
                    >Is registered?</label
                >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
