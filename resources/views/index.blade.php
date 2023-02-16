@php
/**
 * The template for index or default page.
 *
 * This section displays the welcome and select destination page of
 * the travel guide.
 *
 * @package Laravel
 * @author Tristan Jake Alcantara
 * @since 2023
 */
@endphp

<x-layout>
    <div class="dot-matrix">
        <div class="container">
            <div class="row align-items-center text-center text-white min-vh-100">
                <div class="col-md-12">
                    <img src="/images/logo.png" class="img-fluid m-3" width="128" alt="logo">
                    <h1 class="display-1 p-3">Welcome to Travel Guide Japan</h1>
                    <h2>Please select your destination</h2>
                    <form method="POST" action="/dashboard">
                        @csrf
                        <x-destination />
                        <button type="submit" class="btn btn-danger btn-lg m-3">Start Guide</button>
                    </form>
                    <p class="p-5">© Bizmates, Inc. all rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
