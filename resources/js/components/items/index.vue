<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";

let items = ref([])

const router = useRouter();

const showHome = () => {
    router.push("/");
};

const newItem = () => {
    router.push("/new/item");
};

const editItem = () => {
    router.push("/edit/item");
};
const deleteItem = () => {
    router.push("");
};

onMounted(async () => {
    getItems()
})

const getItems = async () => {
    let response = axios.get("/api/get/items")
    items.value = response.data.items
}
</script>

<template>
    <div class="items">
        <h2>Parts</h2>
        <button type="button" class="btn btn-dark" @click="showHome">
            Back
        </button>
        <button type="button" class="btn btn-info ms-2" @click="newItem">New</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Serial N.</th>
                    <th scope="col">Car</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.id" v-if="items.length > 0">
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-center text-danger">
                        <span class="cursor-pointer" @click="deleteItem">Delete</span>
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editItem">Edit</span>
                    </td>
                </tr>
                <tr v-if="items.length <= 0">
                    <td><h3>No Parts</h3></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
