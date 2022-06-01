<?php

namespace App\Http\Controllers;
use App\Http\Requests\Partner_typeRequest;
use App\Models\Partner_type;
use App\Response;
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
        return view('partner_type.index');
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
    public function store(Partner_typeRequest $request)
    {
        $partner_type = new Partner_Type();
        $partner_type->name = $request->name;
        $partner_type->save();
        return Response::responseOK('Tipo de Parceiro cadastrado com sucesso');
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
    public function update(Partner_typeRequest $request, Partner_type $partner_type)
    {
        $partner_type->name = $request->name;
        $partner_type->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner_type  $partner_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner_type $partner_type)
    {
        try{
            if($partner_type->delete()){
                return Response::responseSuccess();
            } else {
                return Response::responseForbiden();
            }
        }catch (\Exception $exception){
            return Response::responseForbiden('Não é possível a exclusão do tipo de parceiro, exclua os parceiros vinculados.');
        }
    }

    public function bootgrid(Request $request)
    {
        $partner_type = new Partner_type();
        $bootgrid = $partner_type->bootgrid($request);
        return response()->json($bootgrid);
    }

}
