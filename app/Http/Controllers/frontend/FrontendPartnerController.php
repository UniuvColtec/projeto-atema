<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Partner;
use App\Models\Partner_type;
use Illuminate\Http\Request;
use Nette\Utils\Paginator;

class FrontendPartnerController extends Controller
{
    function index(Request $request)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $partner_types = Partner_type::orderBy('name')->get(['id', 'name']);
        $partners = Partner::with('city', 'firstImage')->Paginate(9);
        if($request->city_id){
            $partners->where('city_id',$request->city_id);

        }
        return view('web.partner.list', compact('partners','cities','partner_types'));
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
