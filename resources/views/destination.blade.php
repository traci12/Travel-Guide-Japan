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
            <div class="col-md-4 col-sm-12 bg-danger opacity-75 text-center text-white">
                <a href="/">
                    <img src="/images/logo.png" class="position-absolute top-0 start-0 img-fluid m-3" width="72" alt="logo">
                </a>
                <weather-component></weather-component>
            </div>
            <div class="col-md-8 col-sm-12 bg-white">
                <h1 class="display-4 m-3">Places to Visit</h1>
            </div>
        </div>
    </div>
</x-layout>
