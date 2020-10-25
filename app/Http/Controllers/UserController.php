<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Auth;
use App\Models\User;
use App\Models\Level;

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
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('users.create', ['levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->level_id = intval($request->level);
        $user->email = $request->email;
        if($request->password != "")
            $user->password = Hash::make($request->password);
        if($user->save())
            return redirect()->route('users.index')->with('status', 'Usuário criado com sucesso!');
        else
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $levels = Level::all();
        $user = User::find($id);
        return view('users.edit', ['levels' => $levels, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->level_id = intval($request->level);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save())
            return redirect()->route('users.index')->with('status', 'Usuário atualizado com sucesso!');
        else
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->delete())
            return redirect()->route('users.index')->with('status','Usuário deletado com sucesso!');
        else
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);   
   }
}
