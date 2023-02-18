<template>
    <div class="row row-cols-1 row-cols-md-1 g-4">
        <pulse-loader v-if="!places" class="text-center m-3" :color="color"></pulse-loader>
        <div v-for="(place, index) in places" class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ place.name }}</h5>
                    <p class="card-text">{{ place.location.formatted_address }}</p>
                    <a href="#" class="btn btn-danger">Check Location</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['destination'],
        mounted() {
            this.fetchData()
        },
        data() {
            return {
                places: '',
                color: '#495057',
            }
        },
        methods: {
            fetchData() {
                fetch('/places/' + this.destination)
                    .then(response => response.json())
                    .then(data => {
                        this.places = data.results
                    })
            }
        }
    }
</script>
