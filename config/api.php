<?php
/*
 * Third-party API Services
 *
 * @api OpenWeatherMap - weather api
 * @api FourSquare - places api
 */

return [
    'openweathermap' => [
        'url' => env('OPENWEATHERMAP_URL'),
        'key' => env('OPENWEATHERMAP_KEY'),
    ],
    'foursquare' => [
        'url' => env('FOURSQUARE_URL'),
        'key' => env('FOURSQUARE_KEY'),
    ],
];
