<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Models\City;
use App\Models\Partner;
use App\Models\Partner_city;
use App\Models\Partner_type;
use App\Response;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $cities = City::orderBy('name')->get(['id', 'name']);
        $partner_types = Partner_type::orderBy('name')->get(['id', 'name']);
        return view('partner.create',compact('partner_types','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->partner_type_id= $request->partner_type_id;
        $partner->site = $request->site;
        $partner->telephone = $request->telephone;
        $partner->address = $request->address;
        $partner->district = $request->district;
        $partner->latitude = $request->latitude;
        $partner->longitude = $request->longitude;
        $partner->save();


        return Response::responseOK('Parceiro cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {   $cities = City::orderBy('name')->get(['id', 'name']);
        $partner_type = Partner_type::orderBy('name')->get(['id', 'name']);
        return view('partner.edit', compact('partner','partner_type','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->partner_type_id= $request->partner_type_id;
        $partner->site = $request->site;
        $partner->telephone = $request->telephone;
        $partner->address = $request->address;
        $partner->district = $request->district;
        $partner->latitude = $request->latitude;
        $partner->longitude = $request->longitude;
        $partner->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        if($partner->delete()){
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }
    }
    public function bootgrid(Request $request)
    {
        $partners = new Partner();
        $bootgrid = $partners->bootgrid($request);
        return response()->json($bootgrid);
    }
}
