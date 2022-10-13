<?php

namespace App\Http\Controllers;

use App\Models\WorkerDetail;
use App\Http\Requests\StoreWorkerDetailRequest;
use App\Http\Requests\UpdateWorkerDetailRequest;

class WorkerDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreWorkerDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkerDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkerDetail  $workerDetail
     * @return \Illuminate\Http\Response
     */
    public function show(WorkerDetail $workerDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkerDetail  $workerDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkerDetail $workerDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkerDetailRequest  $request
     * @param  \App\Models\WorkerDetail  $workerDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkerDetailRequest $request, WorkerDetail $workerDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerDetail  $workerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkerDetail $workerDetail)
    {
        //
    }
}
