<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(IucnApiService $api)
    {

        $systems = $api->getSystems();
        $countries = $api->getCountries();

        return view('pages.home', compact('systems', 'countries'));
    }
}
