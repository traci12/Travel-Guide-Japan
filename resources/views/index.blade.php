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
                        <select required class="form-select form-select-lg mb-3" aria-label=".form-select-lg destination">
                            <option selected value="">Open this select menu</option>
                            <option value="Tokyo, JP">Tokyo</option>
                            <option value="Yokohama, JP">Yokohama</option>
                            <option value="Kyoto, JP">Kyoto</option>
                            <option value="Osaka, JP">Osaka</option>
                            <option value="Sapporo, JP">Sapporo</option>
                            <option value="Nagoya, JP">Nagoya</option>
                        </select>
                        <button type="submit" class="btn btn-danger btn-lg m-3">Start Guide</button>
                    </form>
                    <p class="p-5">© Bizmates, Inc. all rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
