<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Http\Requests\StorePortofolioRequest;
use App\Http\Requests\UpdatePortofolioRequest;

class PortofolioController extends Controller
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
        return view('landingPage.create-portofolio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortofolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortofolioRequest $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'image' => 'image|file',
        ]);

        $validateData['user_id'] = $request->Auth::user()->id;
        $validateData['description'] = $request -> editor1;
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('portofolio', 'public');
        }
        dd($validateData);

        Portofolio::create($validateData);
        return redirect('/profile-worker')->with('toast_success', 'Portofolio berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortofolioRequest  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortofolioRequest $request, Portofolio $portofolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        //
    }
}
