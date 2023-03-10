<?php
/**
 * The controller for places component.
 *
 * This section is the controller to call places
 * api for the places component.
 *
 * @package Laravel
 * @author Tristan Jake Alcantara
 * @since 2023
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    // Sort options constant: RELEVANCE, RATING, DISTANCE, POPULARITY
    const API_SORT = "RATING";

    /*
     * The default method to call the destination places.
     *
     * @request $request
     * @config api config
     * @return json object
     */
    public function index(Request $request)
    {
        // load api configuration
        $apiUrl = config("api.foursquare.url");
        $apiKey = config("api.foursquare.key");

        // get destination request
        $destination = $request->destination;

        // set limits
        $limit = $request->limit;

        // call api request
        $response = Http::withHeaders(['Authorization' => $apiKey])->get($apiUrl."/search?near=".$destination."&sort=".self::API_SORT."&limit=".$limit);

        return $response->json();
    }

    /*
     * The method to search a place.
     *
     * @request $request
     * @config api config
     * @return json object
     */
    public function search(Request $request)
    {
        // load api configuration
        $apiUrl = config("api.foursquare.url");
        $apiKey = config("api.foursquare.key");

        // get search query request
        $search = $request->search;

        // get destination request
        $destination = $request->destination;

        // set limits
        $limit = $request->limit;

        // call api request
        $response = Http::withHeaders(['Authorization' => $apiKey])->get($apiUrl."/search?query=".$search."&near=".$destination."&sort=".self::API_SORT."&limit=".$limit);

        return $response->json();
    }
}
