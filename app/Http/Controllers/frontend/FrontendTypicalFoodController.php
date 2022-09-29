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
use App\Models\Typical_food_city;
use Illuminate\Http\Request;

class FrontendTypicalFoodController extends Controller
{
    function index(Request $request)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $typical_foods = Typical_food::with('cities', 'firstImage')->Paginate(9);
        if($request->city_id){
            $typical_foods->where('city_id',$request->city_id);

        }
        return view('web.typicalfood.list', compact('typical_foods','cities'));
    }

    function show(int $id)
   {
       $typical_food =  Typical_food::with('cities')->findOrFail($id); //->cities()->get();
       //$events = Event::with('typical_food')->where('typical_food_id', $id)->get(); // Corrigir
       $events = Event::all();
       return view('web.typicalfood.show', compact('typical_food','events'));
    }


}
