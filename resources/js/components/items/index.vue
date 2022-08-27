<script setup>
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";

let items = ref([]);

const router = useRouter();

const showHome = () => {
    router.push("/");
};

const newItem = () => {
    router.push("/new/item");
};

const editItem = (id) => {
    router.push("/edit/item/" + id);
};

const deleteItem = (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You cant undo this",
        icon: "warning",
        confirmButtonColor: "#4595d1",
        cancelButtonText: "#000",
        confirmButtonText: "Delete Part",
    }).then((result) => {
        if (result.value) {
            axios
                .post("/api/delete/item/" + id)
                .then((response) => {
                    toast.fire({
                        icon: "success",
                        title: "Item was successfully deleted",
                    });

                    getItems()
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

onMounted(async () => {
    getItems();
});

const getItems = async () => {
    let response = await axios.get("/api/get/items");
    console.log(response.data);
    items.value = response.data.items;
};
</script>

<template>
    <div class="items">
        <h2>Parts</h2>
        <button type="button" class="btn btn-dark" @click="showHome">
            Back
        </button>
        <button type="button" class="btn btn-info ms-2" @click="newItem">
            New
        </button>
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
                <tr
                    v-for="item in items"
                    :key="item.id"
                    v-if="items.length > 0"
                >
                    <th scope="row">1</th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.serialnumber }}</td>
                    <td>{{ item.car ? item.car.name : "No asigned" }}</td>
                    <td class="text-center text-danger">
                        <span
                            class="cursor-pointer"
                            @click="deleteItem(item.id)"
                            >Delete</span
                        >
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editItem(item.id)"
                            >Edit</span
                        >
                    </td>
                </tr>
                <tr v-else>
                    <td><h3>No Parts</h3></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
