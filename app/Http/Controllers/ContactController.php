<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use App\Models\Event;
use App\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->permit == 0) {
            $event_dates = Event::all('start_date');
            foreach ($event_dates as $event_date) {
                $carbon_event_date = Carbon::create($event_date->start_date);
                $carbon_start_date = Carbon::create($request->start_date);
                if($carbon_event_date->day == $carbon_start_date->day and $carbon_event_date->month == $carbon_start_date->month and $carbon_event_date->year == $carbon_start_date->year) {
                    return Response::responseError("Existe um evento nesta mesma data. Clique aqui para liberar o cadastro.
                           <button style='border: none; background-color: lightcyan; border-radius: 10px; padding: 5px; margin: 0 2px' onclick='permit()'>Permitir</button>
                           <a target='_blank' style='border: none; background-color: lightyellow; border-radius: 10px; padding: 5px; margin: 0 2px; text-decoration: none; color: black;' href='/evento?dates=$carbon_event_date->year-$carbon_event_date->month-$carbon_event_date->day'>Ver Eventos</a>");
                }
            }
        }
        $request->validate([
           'name' =>'required',
               'telephone'=>'required',
               'email'=>'required|email',
               'name_org' =>'required',
               'address'=>'required',
               'city'=>'required',
               'description' =>'required',
               'start_date'=>'required',
               'final_date' =>'required'
           ]
       );
       $data= array(
           'name'=>$request->name,
           'telephone'=>$request->telephone,
           'email'=>$request->email,
           'name_org'=>$request->name_org,
           'address'=>$request->address,
           'city'=>$request->city,
           'description'=>$request->description,
           'start_date'=>$request->start_date,
           'final_date'=>$request->final_date

       );
       Mail::to(config('mail.from.address'))
           ->send(new SendMail($data));
       return back()
           ->with('success',' obrigado por nos contactar');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
