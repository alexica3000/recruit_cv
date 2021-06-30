<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRecruitRequest;
use App\Http\Requests\AddSkillRequest;
use App\Http\Requests\AddWorkRequest;
use App\Http\Requests\EditRecruitRequest;
use App\Http\Requests\EditWorkAjaxRequest;
use App\Recruit;
use App\Skill;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecruitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruits = Recruit::paginate(10);

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
    public function store(AddRecruitRequest $request)
    {
        $recruit = new Recruit;
        $recruit->fill($request->all());
        $recruit->save();

        /* insert data to works table */
        if($request->filled('experience'))
            $this->insertDataToWork($request->experience,   $recruit, Work::WORK_TYPE);
        if($request->filled('education'))
            $this->insertDataToWork($request->education,    $recruit, Work::EDUCATION_TYPE);
        if($request->filled('course'))
            $this->insertDataToWork($request->course,       $recruit, Work::COURSE_TYPE);

        /* insert data to skills table */
        if(!empty($request->skills))
            $this->insertDataToSkill($request->skills,          $recruit, Skill::SKILLS_TYPE);
        if(!empty($request->characteristics))
            $this->insertDataToSkill($request->characteristics, $recruit, Skill::CHARACTERISTICS_TYPE);
        if(!empty($request->social))
            $this->insertDataToSkill($request->social,          $recruit, Skill::SOCIAL_TYPE);
        if(!empty($request->interests))
            $this->insertDataToSkill($request->interests,       $recruit, Skill::INTERESTS_TYPE);

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
    public function update(EditRecruitRequest $request, Recruit $recruit)
    {
        $recruit->update($request->all());

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getWork(Recruit $recruit, Work $work)
    {
        return $recruit->works()->where('id', $work->id)->get()->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWork(Recruit $recruit, EditWorkAjaxRequest $request, Work $work)
    {
        $new_work = new Work([
            'employer'      => $request->fields['modal_employer'],
            'job'           => $request->fields['modal_edit_name'],
            'start_date'    => $request->fields['start_year'],
            'end_date'      => $request->fields['end_year'],
            'description'   => $request->fields['modal_edit_description']
        ]);

        $recruit->works()->where('id', $work->id)->update($new_work->toArray());

        return response()->json(['status' => true, 'id' => $work->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWork(AddWorkRequest $request, Recruit $recruit)
    {
        $work = new Work([
            'employer'      => $request->fields['modal_employer'],
            'job'           => $request->fields['modal_edit_name'],
            'start_date'    => $request->fields['start_year'],
            'end_date'      => $request->fields['end_year'],
            'description'   => $request->fields['modal_edit_description']
        ]);

        $work->type = Work::typeOfTable($request->type);
        $recruit->works()->save($work);

        return response()->json(['status' => true, 'id' => $work->id]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSkill(Recruit $recruit, AddSkillRequest $request)
    {
        $skill = new Skill($request->all());
        $skill->type = $request->type;
        $recruit->skills()->save($skill);

        return response()->json(['status' => true, 'id' => $skill->id]);
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

    private function insertDataToWork($fields, Recruit $recruit, $type)
    {
        foreach ($fields as $field)
        {
            $work = new Work([
                'employer'      => $field['employer'],
                'job'           => $field['job'],
                'start_date'    => $field['start'],
                'end_date'      => $field['end'],
                'description'   => $field['description']
            ]);

            $work->type = $type;
            $recruit->works()->save($work);
        }
    }


    private function insertDataToSkill($fields, Recruit $recruit, $type)
    {
        $containers = [];

        foreach ($fields as $field)
        {
            $skill = new Skill([
                'char'          => $field['char'],
                'description'   => $field['description']
            ]);
            $skill->type = $type;
            $containers[] = $skill;
        }
        $recruit->skills()->saveMany($containers);
    }

}
