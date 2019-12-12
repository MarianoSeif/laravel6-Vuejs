<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr v-for="product in products" :key="product.id">
                            <td>{{product.name}}</td>
                            <td>{{product.description}}</td>
                            <td><button class="btn btn-sm btn-success">Edit</button></td>
                            <td><button class="btn btn-sm btn-danger">Delete</button></td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: []
            }
        },
        mounted() {
            console.log('ProductCard component mounted.')
        },
        created() {
            axios.get('./api/products').then(response => this.products = response.data)
        }
    }
</script>
