<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Event;
use App\Models\Event_category;
use App\Models\Partner;
use App\Models\Typical_event_food;
use App\Models\Typical_food;
use Illuminate\Http\Request;

class FrontendTypicalFoodController extends Controller
{
    function index()
    {
        $typical_foods = Typical_food::with('city', 'firstImage')->get();
        return view('web.typicalfood.list', compact('typical_foods'));
    }

    function show(int $id)
   {
       $typical_food =  Typical_food::findOrFail($id);
       $city = City::all();
       $typical_foods_cities = City::all();
       return view('web.typicalfood.show', compact('typical_food','city','typical_foods_cities'));
    }


}
