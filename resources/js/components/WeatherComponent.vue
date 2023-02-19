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
  <section>
    <div class="row align-items-center">
      <div class="container p-5">
        <h1>{{ destination }}</h1>

        <pulse-loader 
            v-if="!currentWeather.temp" 
            class="text-center m-5" 
            :color="color">
        </pulse-loader>

        <p v-if="currentWeather.temp" class="display-1 fade-in-effect">{{ currentWeather.temp }}°C</p>

        <p class="lead fade-in-effect">{{ currentWeather.desc }}</p>
      </div>

    </div>

    <div class="row m-2">
      <div v-for="(forecast, index) in forecasts" class="col-4 card text-bg-dark border-white rounded-0 fade-in-effect">
        <div class="card-header">{{ formatDate(forecast.dt_txt) }}</div>
        <div class="card-body">
          <h3 class="card-title">{{ Math.round(forecast.main.temp) }}°C</h3>
          <p class="card-text">{{ forecast.weather[0].description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: ['destination'],
    mounted() {
      this.getWeather()
      this.getForecast()
    },
    data() {
      return {
        currentWeather: {
          temp: '',
          main: '',
          desc: ''
        },
        forecasts: '',
        color: 'white',
      }
    },
    methods: {
      formatDate(date) {
        let today = new Date(date);
        let month = today.toLocaleString('default', { month: 'short' })
        let day = today.getDate();
        let time = today.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

        return month + ' ' + day + ' ' + time;
      },
      getWeather() {
        fetch('/weather/' + this.destination)
          .then(response => response.json())
          .then(data => {
            this.currentWeather.temp = Math.round(data.main.temp)
            this.currentWeather.main = data.weather[0].main
            this.currentWeather.desc = data.weather[0].description
              .split(' ')
              .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
              .join(' ')
          }
        )
      },
      getForecast() {
        fetch('/forecast/' + this.destination)
          .then(response => response.json())
          .then(data => {
            this.forecasts = data.list
          }
        )
      },
    }
  }
</script>
