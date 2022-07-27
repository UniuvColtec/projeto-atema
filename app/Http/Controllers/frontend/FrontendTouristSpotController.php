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

    function show(int $id)
    {
        $tourist_spot =  Tourist_spot::findOrFail($id);
        echo $tourist_spot->tourist_spot_image;
        dd($tourist_spot);
    }
}
