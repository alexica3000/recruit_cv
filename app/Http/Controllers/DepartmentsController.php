<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('departments.view', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $path = $request->file('logo')->store('logos');

        $cover = $request->file('logo');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        Department::create([
            'name' => $request->department,
            'logo' => $cover->getFilename().'.'.$extension
        ]);

        return redirect()->route('departments.index')->with('message', 'The department has been successfully added.');
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
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->update([
            'name' => $request->department
        ]);

        return redirect()->route('departments.edit', ['id' => $department->id])->with('message', 'The department has been update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->destroy($department->id);
        Storage::disk('public')->delete($department->logo);

        return redirect()->route('departments.index')->with('message', 'The department has been successfully deleted.');
    }
}
