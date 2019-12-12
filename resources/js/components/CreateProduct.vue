<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        <form action="/api/products" method="post">
                            <input type="hidden" :value="csrfToken" name="_token" />
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <textarea rows="3" id="description" name="description" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Create product component mounted')
        },
        data() {
            return{csrfToken: null}
        },
        created() {
            this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
        }
    }

</script>
