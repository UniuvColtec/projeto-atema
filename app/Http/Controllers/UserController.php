<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\City;
use App\Response;
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
        return view('user.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(UserRequest $request)
    {
            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            if($request->password != $request->confirmpassword){
                return Response::responseError('Erro ao cadastrar senha');
            }
            $user->email = $request->email;
            $user->city_id = $request->city_id;

            $user->save();

            return Response::responseOK('Usuário cadastrado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $cities = City::orderBy('name')->get(['id', 'name']);
        return view('user.edit', compact('user', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }if($request->password != $request->confirmpassword){
            return Response::responseError('Erro ao cadastrar senha');
        }
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)

    {
        if ($user->delete()) {
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }
    }

    public function bootgrid(Request $request)
    {
        $users = new User();
        $bootgrid = $users->bootgrid($request);
        return response()->json($bootgrid);
    }
}
