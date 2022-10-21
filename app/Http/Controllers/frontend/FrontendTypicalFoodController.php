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
        $typical_foods = Typical_food::with('cities', 'firstImage');
        if($request->name){
            $typical_foods->where('name','like','%'.$request->name.'%');

        }
        $typical_foods = $typical_foods->Paginate(9);
        return view('web.typicalfood.list', compact('typical_foods','cities'));
    }

    function show(int $id)
   {
       $typical_food =  Typical_food::with('cities', 'events')->findOrFail($id); //->cities()->get();
       $events = $typical_food->events;
       return view('web.typicalfood.show', compact('typical_food', 'events'));
    }


}
