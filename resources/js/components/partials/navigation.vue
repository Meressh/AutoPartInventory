<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";

const router = useRouter();
let search = ref({
    filter: "",
    filterByCar: "",
});

const showHome = () => {
    router.push(`${props.back}`);
};

const emitSearch = () => {
    let dataHolder = props.data;

    let dataFiltered = dataHolder.filter((main) =>
        main.name.toLowerCase().includes(search.value.filter.toLowerCase())
    );

    emit("searchData", dataFiltered);
};

const emitSearchByCar = () => {
    let dataHolder = props.data;

    if(!search.value.filterByCar){
        emit("searchData", dataHolder);
        return;
    }

    let newDataWithoutNull = [];

    dataHolder.forEach((element) => {
        if (element.car !== null) {
            newDataWithoutNull.push(element);
        }
    });


    let dataFiltered = newDataWithoutNull.filter((main) =>
        main.car.name
            .toLowerCase()
            .includes(search.value.filterByCar.toLowerCase())
    );

    emit("searchData", dataFiltered);
};

const newData = () => {
    router.push(`/new/${props.new}`);
};

const props = defineProps({
    back: {
        type: String,
        default: "",
    },
    title: {
        type: String,
        default: "",
    },
    new: {
        type: String,
        default: "",
    },
    searchByCar: {
        type: Boolean,
        default: false,
    },
    data: {
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
            <h2>{{ props.title }}</h2>
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
            <input
                type="text"
                class="form-control mt-1"
                id="search"
                v-model="search.filterByCar"
                v-if="props.searchByCar"
                placeholder="Search by car"
                v-on:keyup.enter="emitSearchByCar"
                required
            />
        </div>
    </div>
</template>
