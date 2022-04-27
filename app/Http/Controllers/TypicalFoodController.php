<?php

namespace App\Http\Controllers;

use App\Bootgrid;
use App\Models\Typical_food;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class TypicalFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typical_food= Typical_Food::all();
        return view('typical_food.index', compact('typical_food'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typical_food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typical_food= new Typical_food();
        $typical_food->name = $request->name;
        $typical_food->description = $request->description;
        $typical_food->image = $request->image;
        $typical_food->save();
        return redirect('typical_food');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function show(Typical_food $typical_food)
    {
        return view('typical_food.show', compact('typical_food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function edit(Typical_food $typical_food)
    {
        return view('typical_food.edit', compact('typical_food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typical_food $typical_food)
    {
        $typical_food->name = $request->name;
        $typical_food->description = $request->description;
        $typical_food->image = $request->image;
        $typical_food->save();
        return redirect('typical_food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typical_food $typical_food)
    {
        $typical_food->delete();
        return redirect('typical_food');
    }
    public function bootgrid(Request $request)
    {
        $bootgrid = new Bootgrid();
        $bootgrid->query($this, $request, ['name']);
        return $bootgrid;
    }
}
