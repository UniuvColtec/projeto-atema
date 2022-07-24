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

    function show(Event $event)
    {
        dd($event);
    }

    function map()
    {
        return 'mapa';
    }

}
