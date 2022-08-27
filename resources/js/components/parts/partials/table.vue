<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";

const router = useRouter();

const props = defineProps({
    parts: {
        type: Object,
        default: {},
    },
});

const emit = defineEmits({
    getNewParts: {
        type: Boolean,
        default: false,
    },
});

const editPart = (id) => {
    router.push("/edit/part/" + id);
};

const deletePart = (id) => {
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
                .post("/api/delete/part/" + id)
                .then((response) => {
                    toast.fire({
                        icon: "success",
                        title: "part was successfully deleted",
                    });

                    emit("getNewParts", true)
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
        <tbody v-if="parts.length > 0">
            <tr v-for="part in parts" :key="part.id">
                <th scope="row">{{ part.id }}</th>
                <td>{{ part.name }}</td>
                <td>{{ part.serialnumber }}</td>
                <td>{{ part.car ? part.car.name : "No asigned" }}</td>
                <td class="text-center text-danger">
                    <span class="cursor-pointer" @click="deletePart(part.id)"
                        >Delete</span
                    >
                </td>
                <td class="text-center">
                    <span class="cursor-pointer" @click="editPart(part.id)"
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
