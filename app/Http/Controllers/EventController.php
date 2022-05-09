<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        $event = Event::all();
        return view('event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if (count($request->cities)==0){
            return Response::responseError('Não foi selecionada nenhuma cidade');
        }*/

        $coordinates = getCoordinates($request->link);

        $event= new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->contact = $request->contact;
        $event->start_date = $request->start_date;
        $event->final_date = $request->final_date;
        $event->address = $request->address;
        $event->district= $request->district;
        $event->latitude = $coordinates['latitude'];
        $event->longitude = $coordinates['longitude'];;
        $event->save();

/*        foreach ($request->cities as $city){
            $partner_city = new Partner_city();
            $partner_city->partner_id = $partner->id;
            $partner_city->city_id = $city;
            $partner_city->save();
        }*/
        return redirect('event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->name = $request->name;
        $event->description = $request->description;
        $event->contact = $request->contact;
        $event->start_date = $request->start_date;
        $event->final_date = $request->final_date;
        $event->address = $request->address;
        $event->district= $request->district;
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
        $event->delete();
        return redirect('event');
    }
}
