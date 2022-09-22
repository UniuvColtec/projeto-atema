<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Event;
use App\Models\Event_category;
use App\Models\Partner;
use App\Models\Partner_type;
use App\Models\Tourist_spot;
use App\Models\Typical_event_food;
use App\Models\Typical_food;
use Illuminate\Http\Request;

class FrontendEventController extends Controller
{
    function index(Request $request)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $categories = Category::orderby('name')->get(['id','name']);
        $events = Event::where('status', 'Aprovado')->whereDate('final_date', '>=', date('Y-m-d'))->orderBy('start_date')->with('city', 'firstImage')->Paginate(3);
        //return 'eventos - listagem';
        if ($request->cities) {
            $events->where('city_id', '=', $request->cities);
        }
        if($request->categories){
            $events->where('category_id', '=' ,$request->categories);
        }
        return view('web.event.list', compact('events','cities','categories'));
    }

    function show(int $id)
    {
        $event =  Event::findOrFail($id);
        return view('web.event.show', compact('event'));
    }

    function map()
    {
        return 'mapa - exibir todos as Geo Localização';
    }



}
