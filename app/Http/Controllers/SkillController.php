<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\SkillWorker;
use App\Models\User;
use App\Models\WorkerDetail;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landingPage.create-skill-worker', [
            'skills' => Skill::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkillRequest $request)
    {


        request()->validate([
            'skill_id' => 'required|array'
        ]);

        $skill = SkillWorker::create([
            'user_id' => Auth::user()->id,
        ]);
        $skill->skill()->attach(request('skill_id'));


        return redirect('/profile-worker')->with('success', 'Skill telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $user = WorkerDetail::where('user_id', Auth::user()->id)->first();

        $skill = explode(',', $user->skill);


        return view('landingPage.edit-skill-worker', [
            'skills' => Skill::all(),
            'details' => $user,
            'check' => $skill
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkillRequest  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillRequest $request, WorkerDetail $wd)
    {
        $user = WorkerDetail::where('user_id', Auth::user()->id)->first();
        $validateData = $request->validate([
            'skill' => 'required|array'
        ]);
        $validateData['skill'] = $request->skill;
        WorkerDetail::where('user_id', $user->id)->update($validateData);

        return redirect('/profile-worker')->with('success', 'Skill telah ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
