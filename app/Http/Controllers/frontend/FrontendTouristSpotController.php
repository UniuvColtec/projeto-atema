<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Tourist_spot;
use Illuminate\Http\Request;

class FrontendTouristSpotController extends Controller
{
    function index()
    {
        return 'pontos turisticos - listagem';
    }

    function show(Tourist_spot $tourist_spot)
    {
        dd($tourist_spot);
    }
}
