<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use App\Models\City;
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
        $cities = City::all();
        $todays_date = date('Y-m-d\TH:i:s');
        $todays_date=date('Y-m-d\TH:i:s', strtotime($todays_date.'+3days'));
        return view('web.contact.index', compact('cities','todays_date'));
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
