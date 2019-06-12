<?php

namespace App\Http\Controllers;

use App\Recruit;
use App\Skill;
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
//        $works = $recruit->works()->where('type', 1)->get();
//        $educations = $recruit->works()->where('type', 2)->get();
//        $course = $recruit->works()->where('type', 3)->get();


//        $recruit->load('skills')->get();

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
        if(isset($request->get_work_id) && !empty($request->get_work_id))
            return $this->getRowFromWorks($recruit, $request->get_work_id);

        if(isset($request->update_work_id) && !empty($request->update_work_id))
            return $this->updateRowFromWorks($recruit, $request);


        $recruit->update([
            'name' => $request->name,
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d'),
            'city' => $request->city,
            'job' => $request->job,
            'description' => $request->description
        ]);

        // insert data to skills table
        if(!empty($request->skills))
            $this->insertDataToSkill($request->skills, $recruit, Skill::SKILLS_TYPE);
        if(!empty($request->charac))
            $this->insertDataToSkill($request->charac, $recruit, Skill::CHARACTERISTICS_TYPE);
        if(!empty($request->social))
            $this->insertDataToSkill($request->social, $recruit, Skill::SOCIAL_TYPE);
        if(!empty($request->interest))
            $this->insertDataToSkill($request->interest, $recruit, Skill::INTERESTS_TYPE);

        // insert data to works table
        if(!empty($request->works))
            $this->insertDataToWork($request->works, $recruit, Work::WORK_TYPE);
        if(!empty($request->educations))
            $this->insertDataToWork($request->educations, $recruit, Work::EDUCATION_TYPE);
        if(!empty($request->courses))
            $this->insertDataToWork($request->courses, $recruit, Work::COURSE_TYPE);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySkill(Recruit $recruit, Skill $skill)
    {
        $recruit->skills()->where('id', $skill->id)->delete();

        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyWork(Recruit $recruit, Work $work)
    {
        $recruit->works()->where('id', $work->id)->delete();

        return response()->json(['status' => true]);
    }








    protected function insertDataToWork($fields, Recruit $recruit, $type)
    {
        foreach ($fields as $field)
        {
            $start_date = $field['start_year'] . '-' . $field['start_month'] . '-01';
            $end_date = ($field['end_month'] == null) ? null : $field['end_year'] . '-' . $field['end_month'] . '-01';

            if($field['work_id'] == 0)
            {
                $work = new Work([
                    'employer' => $field['employer'],
                    'job' => $field['work_job'],
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'description' => $field['work_description']
                ]);
                $work->type = $type;
                $recruit->works()->save($work);
            }

            else
            {
                $work = $recruit->works()->findOrFail($field['work_id']);
                $work->update([
                    'employer' => $field['employer'],
                    'job' => $field['work_job'],
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'description' => $field['work_description']
                ]);
            }
        }
    }

    protected function getRowFromWorks(Recruit $recruit, $id)
    {
        $work = $recruit->works()->where('id', $id)->get()->first();
        return $work;
    }

    protected function updateRowFromWorks(Recruit $recruit, Request $request)
    {
        $start_date = $request->start_year . '-' . $request->start_month . '-01';
        $end_date = ($request->end_year == null) ? null : $request->end_year . '-' . $request->end_month . '-01';

        $work = $recruit->works()->findOrFail($request->update_work_id);
        $work->update([
            'employer' => $request->modal_employer,
            'job' => $request->skill,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'description' => $request->description
        ]);
    }

    protected function insertDataToSkill($fields, Recruit $recruit, $type)
    {
        $containers = [];

        foreach ($fields as $field)
        {
            if($field['skill_id'] == 0)
            {
                $skill = new Skill([
                    'char' => $field['char'],
                    'description' => $field['description']
                ]);
                $skill->type = $type;
                $containers[] = $skill;
            }
        }
        $recruit->skills()->saveMany($containers);
    }


}
