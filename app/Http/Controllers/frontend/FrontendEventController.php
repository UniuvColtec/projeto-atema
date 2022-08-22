<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Event_category;
use App\Models\Typical_event_food;
use App\Models\Typical_food;
use Illuminate\Http\Request;

class FrontendEventController extends Controller
{
    function index()
    {
        $events = Event::where('status', 'Aprovado')->whereDate('final_date', '>=', date('Y-m-d'))->orderBy('start_date')->take(3)->with('city', 'firstImage')->get();
        //return 'eventos - listagem';
        return view('web.event.list', compact('events'));
    }

    function show(int $id)
    {
        $event =  Event::findOrFail($id);
        $event_categories = Event_category::all();
        $categories = Category::all();
        $typical_event_foods = Typical_event_food::all();
        $typical_foods = Typical_food::all();
        return view('web.event.show', compact('event','event_categories','categories','typical_event_foods','typical_foods'));
    }

    function map()
    {
        return 'mapa - exibir todos as Geo Localização';
    }



}
