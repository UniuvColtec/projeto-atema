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
    function index()
    {
        $events = Event::where('status', 'Aprovado')->whereDate('final_date', '>=', date('Y-m-d'))->orderBy('start_date')->with('city', 'firstImage')->Paginate(2);
        //return 'eventos - listagem';
        return view('web.event.list', compact('events'));
    }

    function show(int $id)
    {
        $event =  Event::findOrFail($id);
        $tourist_spots = Tourist_spot::all();
        $city = City::all();
        return view('web.event.show', compact('event','tourist_spots','city'));
    }

    function map()
    {
        return 'mapa - exibir todos as Geo Localização';
    }



}
