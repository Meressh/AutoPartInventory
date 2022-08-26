<script setup>
import { useRouter } from "vue-router"

const router = useRouter()

const showHome = () => {
    router.push('/');
}
</script>

<template>
    <div class="items">
        <h2>Parts</h2>
        <button type="button" class="btn btn-dark" @click="showHome">Back</button>
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-danger">Delete</td>
                    <td>Edit</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-danger">Delete</td>
                    <td>Edit</td>
                </tr>
                <tr>
                    <th scope="row">Action</th>
                    <td>asdasd</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-danger">Delete</td>
                    <td>Edit</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
