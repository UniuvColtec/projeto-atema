<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeSiteController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'Aprovado')->whereDate('final_date', '>=', date('Y-m-d'))->orderBy('start_date')->take(3)->with('city', 'firstImage')->get();

//        dd($events);
        return view('web.home', compact('events'));
    }
}
