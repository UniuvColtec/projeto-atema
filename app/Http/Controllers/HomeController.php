<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    function map()
    {
        $events=Event::all(['latitude','longitude','id','name']);
        foreach($events as $event) {
            $p = new \stdClass();
            $p->id= $event->id;
            $p->name= $event->name;
            $p->lat = $event->latitude;
            $p->long = $event->longitude;
            $points[] = $p;
        }

//        return 'mapa - exibir todos as Geo Localização';
        return view('/home', compact('points'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
