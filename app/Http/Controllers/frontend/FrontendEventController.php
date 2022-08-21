<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
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
        return view('web.event.show', compact('event'));
    }

    function map()
    {
        return 'mapa - exibir todos as Geo Localização';
    }



}
