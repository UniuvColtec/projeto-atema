<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $cities = City::orderBy('name')->get(['id', 'name']);
        return view('user.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //$password = $_POST['password'];
      //  $confirmpassword = $_POST['confirmpassword'];
      //  if($password != $confirmpassword){
       //     $this->retornaErro('Erro ao cadastrar a senha');
      //  }
        $user= new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->save();
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $cities = City::orderBy('name')->get(['id', 'name']);
        return view('user.edit', compact('user','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        if ($request->password!=''){
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->save();
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user');
    }
}
