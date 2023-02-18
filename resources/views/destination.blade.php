@php
/**
 * The template for destination page.
 *
 * This section displays the weather and places of
 * the travel guide.
 *
 * @package Laravel
 * @author Tristan Jake Alcantara
 * @since 2023
 */
@endphp

<x-layout>
  <div class="container-fluid">
    <div class="row min-vh-100">
      <div class="col-md-4 col-sm-12 bg-secondary opacity-75 text-center text-white">
        <a href="/">
          <img
              class="position-absolute top-0 start-0 img-fluid m-3"
              src="/images/logo.png"
              width="72"
              alt="logo">
        </a>
        <weather-component :destination="'{{ $destination }}'"></weather-component>
      </div>

      <div class="col-md-8 col-sm-12 bg-white">
        <h1 class="m-3">Places to Visit in {{ $destination }}</h1>
        <places-component :destination="'{{ $destination }}'"></places-component>
      </div>
    </div>
  </div>
</x-layout>
