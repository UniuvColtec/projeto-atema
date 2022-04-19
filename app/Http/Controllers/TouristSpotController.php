<?php

namespace App\Http\Controllers;

use App\Models\Tourist_spot;
use Illuminate\Http\Request;

class TouristSpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourist_spot = Tourist_Spot::all();
        return view('tourist_spot.index', compact('tourist_spot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tourist_spot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tourist_spot = new Partner();
        $tourist_spot->name = $request->name;
        $tourist_spot->description= $request->description;
        $tourist_spot->address = $request->address;
        $tourist_spot->district = $request->district;
        $tourist_spot->latitude = $request->latitude;
        $tourist_spot->longitude = $request->longitude;
        $tourist_spot->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function show(Tourist_spot $tourist_spot)
    {
        return view('tourist_spot.show', compact('tourist_spot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function edit(Tourist_spot $tourist_spot)
    {
        return view('tourist_spot.edit', compact('tourist_spot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tourist_spot $tourist_spot)
    {
        $tourist_spot->name = $request->name;
        $tourist_spot->description= $request->description;
        $tourist_spot->address = $request->address;
        $tourist_spot->district = $request->district;
        $tourist_spot->latitude = $request->latitude;
        $tourist_spot->longitude = $request->longitude;
        $tourist_spot->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourist_spot $tourist_spot)
    {
        $tourist_spot->delete();
        return redirect('tourist_spot');
    }
}
