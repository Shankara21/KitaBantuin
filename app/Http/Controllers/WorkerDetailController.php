<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $pengajuan = WorkerDetail::where('status', 'Pending')->paginate(10);

        return view('Admin.WorkerDetails.index', [
            'pengajuan' => $pengajuan
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
        return view('Admin.WorkerDetails.show', [
            'pengajuan' => $workerDetail
        ]);
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
        $check = User::where('id', $workerDetail->user_id)->first();
        $check->update([
            'role' => 'Worker'
        ]);
        $workerDetail->status = 'Accepted';
        $workerDetail->save();
        return redirect()->route('worker-details.index')->with('success', 'Worker Details Accepted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerDetail  $workerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkerDetail $workerDetail)
    {

        $workerDetail->delete();
        return redirect()->route('worker-details.index')->with('success', 'Worker Detail deleted successfully');
    }
}
