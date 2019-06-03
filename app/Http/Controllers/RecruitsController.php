<?php

namespace App\Http\Controllers;

use App\Recruit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecruitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruits = Recruit::paginate(2);

        return view('recruits.view', compact('recruits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recruits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Recruit::create([
            'name' => $request->name,
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d'),
            'city' => $request->city,
            'job' => $request->job,
            'description' => $request->description
        ]);

        return redirect()->route('recruits.index')->with('message', 'The recruit has been added.');
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
    public function edit(Recruit $recruit)
    {
        return view('recruits.edit', compact('recruit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recruit $recruit)
    {
        $recruit->update([
            'name' => $request->name,
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d'),
            'city' => $request->city,
            'job' => $request->job,
            'description' => $request->description
        ]);

        return redirect()->route('recruits.edit', $recruit->id)->with('message', 'The recruit has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruit $recruit)
    {
        $recruit->delete();

        return redirect()->route('recruits.index')->with('message', 'The recruit has beeen deleted.');
    }
}
