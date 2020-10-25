<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use Auth;
use App\Models\Client;

class ClientController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
    $clients = Client::all();
    return view('clients.index', ['clients' => $clients]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStoreRequest $request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->address = $request->address;
        $client->street = $request->street;
        $client->number = $request->number;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        if($client->save())
            return redirect()->route('clients.index')->with('status', 'Cliente criado com sucesso!');
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
        $client = Client::findOrFail($id);
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->address = $request->address;
        $client->street = $request->street;
        $client->number = $request->number;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->email = $request->email;
        if($request->password != "")
            $client->password = Hash::make($request->password);
        if($client->save())
            return redirect()->route('clients.index')->with('status', 'Cliente atualizado com sucesso!');
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
        $client = Client::findOrFail($id);
        if($client->delete())
            return redirect()->route('clients.index')->with('status','Cliente deletado com sucesso!');
        else
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);   
    }
}
