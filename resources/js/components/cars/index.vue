<script setup>
import { useRouter } from "vue-router";

const router = useRouter();

const showHome = () => {
    router.push("/");
};

const newCar = () => {
    router.push("/new_car");
};

const editCar = () => {
    router.push("/edit_car");
};

const deleteCar = () => {
    router.push("");
};

</script>

<template>
    <div class="cars">
        <h2>Cars</h2>
        <button type="button" class="btn btn-dark" @click="showHome">
            Back
        </button>
        <button type="button" class="btn btn-info ms-2" @click="newCar">New</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Registration N.</th>
                    <th scope="col">Registered</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Action</th>
                    <td>mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-center text-danger">
                        <span class="cursor-pointer" @click="deleteCar">Delete</span>
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editCar">Edit</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Action</th>
                    <td>mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-center text-danger">
                        <span class="cursor-pointer" @click="deleteCar">Delete</span>
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editCar">Edit</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Action</th>
                    <td>mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-center text-danger">
                        <span class="cursor-pointer" @click="deleteCar">Delete</span>
                    </td>
                    <td class="text-center">
                        <span class="cursor-pointer" @click="editCar">Edit</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
