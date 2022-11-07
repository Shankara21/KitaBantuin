<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillWorkerRequest;
use App\Http\Requests\UpdateSkillWorkerRequest;
use App\Models\SkillWorker;

class SkillWorkerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSkillWorkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkillWorkerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkillWorker  $skillWorker
     * @return \Illuminate\Http\Response
     */
    public function show(SkillWorker $skillWorker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkillWorker  $skillWorker
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillWorker $skillWorker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkillWorkerRequest  $request
     * @param  \App\Models\SkillWorker  $skillWorker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillWorkerRequest $request, SkillWorker $skillWorker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkillWorker  $skillWorker
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillWorker $skillWorker)
    {
        //
    }
}
