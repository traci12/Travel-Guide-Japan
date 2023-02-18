<template>
    <div class="row row-cols-1 row-cols-md-1 g-4">
        <pulse-loader v-if="!places" class="text-center m-3" :color="color"></pulse-loader>

        <p v-if="places" class="text-center">0-{{limit}} of 50 items</p>

        <div v-for="(place, index) in places" class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ place.name }}</h5>
                    <p class="card-text">{{ place.location.formatted_address }}</p>
                    <a target="_blank" 
                        :href="map+destination+' '+place.name+'/'+place.geocodes.main.latitude+','+place.geocodes.main.longitude" 
                        class="btn btn-danger"
                    >
                        Check Location
                    </a>
                </div>
            </div>
        </div>

        <a href="#" 
            v-if="limit < 50 && places" 
            v-on:click="fetchData" 
            class="text-center p-3"
        >
            Load more...
        </a>
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
                map: 'https://www.google.com/maps/search/',
                places: '',
                color: '#495057',
                limit: 0,
            }
        },
        methods: {
            fetchData() {
                this.limit = this.limit + 5;
                fetch('/places/' + this.destination + '/' + this.limit)
                    .then(response => response.json())
                    .then(data => {
                        this.places = data.results
                    }
                )
            }
        }
    }
</script>
