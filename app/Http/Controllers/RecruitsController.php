<?php

namespace App\Http\Controllers;

use App\Recruit;
use App\Work;
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
        $works = $recruit->works()->where('type', 1)->get();
        $educations = $recruit->works()->where('type', 2)->get();
        $course = $recruit->works()->where('type', 3)->get();

        return view('recruits.edit', compact('recruit', 'works', 'educations', 'course'));
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
//        dd($request);

        $recruit->update([
            'name' => $request->name,
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d'),
            'city' => $request->city,
            'job' => $request->job,
            'description' => $request->description
        ]);

        $work = new Work;
        $work->where('recruit_id', $recruit->id)->delete();

        if(!empty($request->works))
            $this->insertData($work, $request->works, $recruit, 1);
        if(!empty($request->educations))
            $this->insertData($work, $request->educations, $recruit, 2);
        if(!empty($request->courses))
            $this->insertData($work, $request->courses, $recruit, 3);

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

    protected function insertData(Work $work, $fields, Recruit $recruit, $type)
    {
        foreach ($fields as $field)
        {
            $start_date = $field['start_year'] . '-' . $field['start_month'] . '-01';

            if($field['end_month'] == null)
                $end_date = null;
            else
                $end_date = $field['end_year'] . '-' . $field['end_month'] . '-01';

            $work->create([
                'employer' => $field['employer'],
                'job' => $field['work_job'],
                'start_date' => $start_date,
                'end_date' => $end_date,
                'description' => $field['work_description'],
                'recruit_id' => $recruit->id,
                'type' => $type
            ]);
        }
    }
}
