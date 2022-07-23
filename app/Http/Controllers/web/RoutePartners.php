<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoutePartners extends Controller
{
    public function partner()
    {
        return view('partner');
    }
}


