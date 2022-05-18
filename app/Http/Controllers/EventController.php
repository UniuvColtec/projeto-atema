<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\City;
use App\Models\Partner;
use App\Models\Typical_food;
use App\Response;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $typical_foods = Typical_food::all();
        $categories = Category::all();
        return view('event.create', compact('cities','typical_foods','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->cities == 0) {
            return Response::responseError('Não foi selecionada nenhuma cidade');
        }
        $event= new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->contact = $request->contact;
        $event->start_date = $request->start_date;
        $event->final_date = $request->final_date;
        $event->address = $request->address;
        $event->district= $request->district;
        $event->city_id = $request->cities;
        $coordinates = $event->getCoordinates($request->localization);
        $event->latitude = $coordinates['latitude'];
        $event->longitude = $coordinates['longitude'];;
        $event->save();

        return Response::responseOK("Evento cadastrado com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $cities = City::all();
        return view('event.show', compact('event','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $cities = City::all();
        $typical_foods = Typical_food::all();
        $categories = Category::all();
        $partners = Partner::all();
        return view('event.edit', compact('event','cities','typical_foods','categories','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->name = $request->name;
        $event->description = $request->description;
        $event->contact = $request->contact;
        $event->start_date = $request->start_date;
        $event->final_date = $request->final_date;
        $event->address = $request->address;
        $event->district= $request->district;
        if($request->localization != ''){
            $coordinates = $event->getCoordinates($request->localization);
            $event->latitude = $coordinates['latitude'];
            $event->longitude = $coordinates['longitude'];;
        }
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        $event->status = $request->status;
        $event->save();
        return redirect('event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event->delete()) {
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }
    }
    public function bootgrid(Request $request)
    {
        $events = new Event();
        $bootgrid = $events->bootgrid($request);
        return response()->json($bootgrid);
    }
}
