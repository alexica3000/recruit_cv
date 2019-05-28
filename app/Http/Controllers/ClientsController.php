<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Department;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.view', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('clients.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department,
            'password' => $request->password
        ]);

        return redirect()->route('clients.index')->with('message', 'The client has been added.');
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
    public function edit(Client $client)
    {
        $departments = Department::all();

        return view('clients.edit', compact('client', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department,
            'password' => $request->password
        ]);

        return redirect()->route('clients.edit', $client->id)->with('message', 'The client has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->destroy($client->id);

        return redirect()->route('clients.index')->with('message', 'The client has been deleted.');
    }
}
