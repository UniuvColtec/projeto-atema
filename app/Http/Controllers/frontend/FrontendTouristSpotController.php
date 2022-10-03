<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Tourist_spot;
use Illuminate\Http\Request;

class FrontendTouristSpotController extends Controller
{
    function index(Request $request)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $tourist_spots = tourist_spot::with('city', 'firstImage');
        //return 'parceiros - listagem';
        if ($request->cities) {
            $tourist_spots->where('city_id', '=', $request->cities);
        }
        $tourist_spots =$tourist_spots->Paginate(9);
        return view('web.tourist_spot.list', compact('tourist_spots','cities'));
    }

    function show(int $id)
    {
        $tourist_spot =  Tourist_spot::findOrFail($id);
        return view('web.tourist_spot.show', compact('tourist_spot'));
    }

    function map()
    {
        return 'mapa - exibir todos as Geo Localização';
    }
}
