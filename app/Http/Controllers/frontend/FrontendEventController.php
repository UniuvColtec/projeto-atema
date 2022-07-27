<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class FrontendEventController extends Controller
{
    function index()
    {
        return 'eventos - listagem';
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
