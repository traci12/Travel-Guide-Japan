/**
 * The template for weather component.
 *
 * This section handles the data to be displayed
 * in the weather component.
 *
 * @package Vue
 * @author Tristan Jake Alcantara
 * @since 2023
 */
<template>
  <div class="row min-vh-100 align-items-center">
    <div class="container">
      <h1>{{ destination }}</h1>

      <pulse-loader 
          v-if="!currentWeather.temp" 
          class="text-center m-5" 
          :color="color">
      </pulse-loader>

      <p v-if="currentWeather.temp" class="display-1">{{ currentWeather.temp }}°C</p>

      <p class="lead">{{ currentWeather.main }}</p>
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
        currentWeather: {
          temp: '',
          main: '',
          desc: ''
        },
        color: 'white',
      }
    },
    methods: {
      fetchData() {
        fetch('/weather/' + this.destination)
          .then(response => response.json())
          .then(data => {
            this.currentWeather.temp = Math.round(data.main.temp)
            this.currentWeather.main = data.weather[0].main
            this.currentWeather.desc = data.weather[0].description
          }
        )
      }
    }
  }
</script>
