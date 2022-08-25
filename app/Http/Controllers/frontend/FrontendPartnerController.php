<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class FrontendPartnerController extends Controller
{
    function index()
    {
        $partners = Partner::with('city', 'firstImage')->get();
        //return 'parceiros - listagem';
        return view('web.partner.list', compact('partners'));
    }

    function show(int $id)
    {
        $partner =  Partner::findOrFail($id);
        return view('web.partner.show', compact('partner'));
    }

    function map()
    {
        return 'mapa - exibir todos as Geo Localização';
    }



}
