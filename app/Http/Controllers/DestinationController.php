<?php
/**
 * The controller for destination page.
 *
 * This section is the controller to send
 * destination request to destination page.
 *
 * @package Laravel
 * @author Tristan Jake Alcantara
 * @since 2023
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /*
     * The default method for destination page.
     *
     * @request $request
     * @return view destination
     */
    public function index(Request $request)
    {
        $destination = $request->destination;

        return view('/destination', ['destination' => $destination]);
    }
}
