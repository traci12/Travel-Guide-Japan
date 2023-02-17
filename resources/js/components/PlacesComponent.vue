<template>
    <div class="row row-cols-1 row-cols-md-1 g-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Place Name</h5>
                    <p class="card-text">Place Address</p>
                    <a href="#" class="btn btn-danger">Check Location</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['destination'],
    }
</script>
