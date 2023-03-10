/**
 * The template for places component.
 *
 * This section handles the data to be displayed
 * in the places component.
 *
 * @package Vue
 * @author Tristan Jake Alcantara
 * @since 2023
 */
<template>
  <div class="row row-cols-1 row-cols-md-1 g-4">
    <div class="input-group mb-3">
      <input v-model="search" 
          name="search" 
          type="text" 
          class="form-control" 
          placeholder="Search a place" 
          aria-label="Search a place" 
          aria-describedby="button-search">
      <button v-on:click="limit = 0; searchPlace();" 
          class="btn btn-outline-secondary" 
          type="button" 
          id="button-search">
        Go
      </button>
    </div>

    <pulse-loader v-if="!places" class="text-center m-3" :color="color"></pulse-loader>

      <p v-if="places" class="text-center">0-{{limit}} of 50 items</p>

      <div v-for="(place, index) in places" class="col-sm-12 fade-in-effect">
        <div class="card text-bg-light bg-light shadow">
          <div class="card-body">
            <h5 class="card-title">{{ place.name }}</h5>
              <p class="card-text">{{ place.location.formatted_address }}</p>
              <p>
                Tags:
                <span v-for="(category, index) in place.categories" class="badge text-bg-secondary m-1 p-2">{{ category.name }}</span>
              </p>
              <a target="_blank" 
                  :href="map+destination+' '+place.name+'/'+place.geocodes.main.latitude+','+place.geocodes.main.longitude" 
                  class="btn btn-danger">
                Check Location
              </a>
          </div>
        </div>
      </div>

      <a href="#" 
          v-if="limit < 50 && places" 
          v-on:click="search == '' ? fetchPlaces() : searchPlace();" 
          class="text-center p-3">
        Load more...
      </a>
  </div>
</template>

<script>
  export default {
    props: ['destination'],
    mounted() {
      this.fetchPlaces()
    },
    data() {
      return {
        map: 'https://www.google.com/maps/search/',
        places: '',
        color: '#495057',
        limit: 0,
        search: '',
      }
    },
    methods: { fetchPlaces() {
        this.places = '';
        this.limit = this.limit + 5;
        fetch('/places/' + this.destination + '/' + this.limit)
          .then(response => response.json())
          .then(data => {
            this.places = data.results
          }
        )
      },
      searchPlace() {
        this.places = '';
        this.limit = this.limit + 5;
        console.log('/places/' + this.destination + '/' + this.limit + '/' + this.search);
        fetch('/places/' + this.destination + '/' + this.limit + '/' + this.search)
          .then(response => response.json())
          .then(data => {
            this.places = data.results
          }
        )
      }
    }
  }
</script>
