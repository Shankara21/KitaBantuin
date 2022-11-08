<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\WorkerDetail;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use App\Models\User;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = Pengajuan::where('status', 'Pending')->paginate(10);

        return view('Admin.Pengajuan.index', [
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
     * @param  \App\Http\Requests\StorePengajuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengajuanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        return view('Admin.Pengajuan.show', [
            'pengajuan' => $pengajuan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengajuanRequest  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        $workerDetail = new WorkerDetail();
        $workerDetail->user_id = $pengajuan->user_id;
        $workerDetail->cv = $pengajuan->cv;
        $workerDetail->about = $pengajuan->about;
        $workerDetail->ktp = $pengajuan->ktp;
        $pengajuan->status = 'Accepted';

        $workerDetail->save();

        $pengajuan->save();

        $user = User::find($pengajuan->user_id);
        $user->role = 'Worker';
        $user->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diterima');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
