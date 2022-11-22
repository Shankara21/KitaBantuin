<?php

namespace App\Http\Controllers;

use App\Models\Project_result;
use App\Http\Requests\StoreProject_resultRequest;
use App\Http\Requests\UpdateProject_resultRequest;

class ProjectResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project_result::paginate(10);
        return view('Admin.ProjectResult.index', [
            'title' => 'Project',
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProject_resultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject_resultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project_result  $project_result
     * @return \Illuminate\Http\Response
     */
    public function show(Project_result $project_result, $id)
    {
        $result = Project_result::where('id', $id)->first();
        return view('Admin.ProjectResult.show', [
            'result' => $result,
            'title' => 'Project Result Detail'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project_result  $project_result
     * @return \Illuminate\Http\Response
     */
    public function edit(Project_result $project_result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProject_resultRequest  $request
     * @param  \App\Models\Project_result  $project_result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProject_resultRequest $request, Project_result $project_result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project_result  $project_result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project_result $project_result)
    {
        //
    }
}
