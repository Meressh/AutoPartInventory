<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";

const router = useRouter();

const props = defineProps({
    items: {
        type: Object,
        default: {},
    },
});

const emit = defineEmits({
    getNewItems: {
        type: Boolean,
        default: false,
    },
});

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

                    emit("getNewItems", true)
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
        <tbody v-if="items.length > 0">
            <tr v-for="item in items" :key="item.id">
                <th scope="row">1</th>
                <td>{{ item.name }}</td>
                <td>{{ item.serialnumber }}</td>
                <td>{{ item.car ? item.car.name : "No asigned" }}</td>
                <td class="text-center text-danger">
                    <span class="cursor-pointer" @click="deleteItem(item.id)"
                        >Delete</span
                    >
                </td>
                <td class="text-center">
                    <span class="cursor-pointer" @click="editItem(item.id)"
                        >Edit</span
                    >
                </td>
            </tr>
        </tbody>
        <tr v-else>
            <td><h3>No Parts</h3></td>
        </tr>
    </table>
</template>
