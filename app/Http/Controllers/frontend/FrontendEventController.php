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
use League\CommonMark\Extension\Strikethrough\StrikethroughDelimiterProcessor;

class FrontendEventController extends Controller
{
    function index(Request $request)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $categories = Category::orderby('name')->get(['id','name']);
        $eventcategories = Event_category::orderby('id')->get(['id']);
        if($request->dates) {
            $events = Event::where('status', 'Aprovado')->whereDate('start_date', '=', $request->dates)->orderBy('start_date')->with('city', 'firstImage');
        } else {
            $events = Event::where('status', 'Aprovado')->whereDate('final_date', '>=', date('Y-m-d'))->orderBy('start_date')->with('city', 'firstImage');
        }

        //return 'eventos - listagem';
        if ($request->cities) {
            $events->where('city_id', '=', $request->cities);
        }
        if ($request->categories) {
            $events->join('event_categories.*', 'events.id', '=', 'event_categories.event_id')->where('event_categories.category_id', '=', $request->categories);
        }

        $events = $events->Paginate(9);
        return view('web.event.list', compact('events','cities','categories'));
    }

    function show(int $id)
    {
        $event =  Event::findOrFail($id);
        return view('web.event.show', compact('event'));
    }

    function map()
    {
        $p = new \stdClass();
        $p->lat = -1.4572002;
        $p->long = -48.4653295;

        $points[] = $p;

//        return 'mapa - exibir todos as Geo Localização';
        return view('web.event.map', compact('points'));
    }



}
