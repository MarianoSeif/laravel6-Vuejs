<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h1>{{message}}</h1>
                        <button class="btn btn-light">{{count}}</button>
                        <button class="btn btn-success" @click="count++">+</button>
                        <button class="btn btn-danger" @click="count--">-</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 0,
                message: 'Hola!'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
