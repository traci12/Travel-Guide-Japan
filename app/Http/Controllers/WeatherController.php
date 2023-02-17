<?php
/**
 * The controller for weather component.
 *
 * This section is the controller to call weather
 * api for the weather component.
 *
 * @package Laravel
 * @author Tristan Jake Alcantara
 * @since 2023
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /*
     * The default method to call the current weather.
     *
     * @request $request
     * @config api config
     * @return json object
     */
    public function index(Request $request)
    {
        // load api configuration
        $apiUrl = config("api.openweathermap.url");
        $apiKey = config("api.openweathermap.key");

        // get destination request
        $destination = $request->destination;

        // call api request
        $response = Http::get($apiUrl."/weather?q=".$destination."&units=metric&APPID=".$apiKey);

        return $response->json();
    }
}
