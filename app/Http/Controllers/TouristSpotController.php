<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Tourist_spot;
use App\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TouristSpotRequest;

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
        $cities = City::orderBy('name')->get(['id', 'name']);
        return view('tourist_spot.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TouristSpotRequest $request)
    {
        $tourist_spot = new Tourist_spot();
        $tourist_spot->city_id = $request->cities;
        $tourist_spot->name = $request->name;
        $tourist_spot->description= $request->description;
        $tourist_spot->address = $request->address;
        $tourist_spot->district = $request->district;
        $tourist_spot->save();
        return Response::responseOK('Ponto Turistico cadastrado com sucesso');
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
        $cities = City::orderBy('name')->get(['id', 'name']);
        return view('tourist_spot.edit', compact('tourist_spot','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function update(TouristSpotRequest $request, Tourist_spot $tourist_spot)
    {
        $tourist_spot->name = $request->name;
        $tourist_spot->city_id = $request->cities;
        $tourist_spot->description= $request->description;
        $tourist_spot->address = $request->address;
        $tourist_spot->district = $request->district;
        $tourist_spot->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourist_spot $tourist_spot)
    {

        if($tourist_spot->delete()){
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }
    }
    public function bootgrid(Request $request)
    {
        $tourist_spot = new Tourist_spot();
        $bootgrid = $tourist_spot->bootgrid($request);
        return response()->json($bootgrid);
    }
}
