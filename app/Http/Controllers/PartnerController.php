<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Partner;
use App\Models\Partner_city;
use App\Models\Partner_type;
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
    {
        $partner_types = Partner_type::orderBy('name')->get(['id', 'name']);
        return view('partner.create',compact('partner_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect('partner');
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
    {   $partner_type = Partner_type::orderBy('name')->get(['id', 'name']);
        return view('partner.edit', compact('partner','partner_type'));
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
        return redirect('partner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect('partner');
    }
}
