<?php

namespace App\Http\Controllers;

use App\Models\Partner_type;
use Illuminate\Http\Request;

class PartnerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner_type = Partner_Type::all();
        return view('partner_type.index', compact('partner_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partner_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partner_type = new Partner_Type();
        $partner_type->name = $request->name;
        $partner_type->type = $request->type;
        $partner_type->save();
        return redirect('partner_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner_type  $partner_type
     * @return \Illuminate\Http\Response
     */
    public function show(Partner_type $partner_type)
    {
        return view('partner_type.show', compact('partner_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner_type  $partner_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner_type $partner_type)
    {
        return view('partner_type.edit', compact('partner_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner_type  $partner_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner_type $partner_type)
    {
        $partner_type->name = $request->name;
        $partner_type->type = $request->type;
        $partner_type->save();
        return redirect('partner_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner_type  $partner_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner_type $partner_type)
    {
        $partner_type->delete();
        return redirect('partner_type');
    }
}
