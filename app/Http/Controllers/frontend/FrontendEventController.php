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
        //$category = Category::where('$event_category->category_id == $category->id');
        //return 'eventos - listagem';
        return view('web.event.event_page', compact('events'));//,'category'//));
    }

    function show(int $id)
    {
        $event =  Event::findOrFail($id);
        echo $event->images[0]->image->address;
        dd($event);
    }

    function map()
    {
        return 'mapa - exibir todos as Geo Localização';
    }



}
