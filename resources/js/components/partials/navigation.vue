<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";

const router = useRouter();
let search = ref({
    filter: "",
});

const showHome = () => {
    router.push(`${props.back}`);
};

const emitSearch = () => {
    let carsHolder = props.cars
    let carsFiltered = carsHolder.filter((car) =>
        car.name.toLowerCase().includes(search.value.filter.toLowerCase())
    );

    emit("searchData", carsFiltered);
};

const newData = () => {
    router.push(`/new/${props.new}`);
};

const props = defineProps({
    back: {
        type: String,
        default: "",
    },
    new: {
        type: String,
        default: "",
    },
    cars: {
        type: Object,
        default: {},
    },
});

const emit = defineEmits({
    searchData: {
        type: Object,
        default: {},
    },
});
</script>

<template>
    <div class="d-flex justify-content-between align-items-end">
        <div class="d-flex flex-column">
            <h2>Cars</h2>
            <div>
                <button type="button" class="btn btn-dark" @click="showHome">
                    Back
                </button>
                <button
                    type="button"
                    class="btn btn-info ms-2"
                    @click="newData"
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
                v-on:keyup.enter="emitSearch"
                required
            />
        </div>
    </div>
</template>
