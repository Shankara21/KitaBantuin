<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $validateData = $request->validate([
            // validasi
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'photo' => 'image|file',
            'bankuser_id' => 'required',
            'bank_account' => 'required'
            // 'bank_account' => 'required',
        ]);

        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $validateData['photo'] = $request->file('photo')->store('profile', 'public');
        }

        User::where('id', $id)
            ->update($validateData);
        Alert::success('Berhasil', 'Profil berhasil di update');
        return redirect('/profile');
    }

    public function updateWorker(Request $request, $id)
    {


        $validateData = $request->validate([
            // validasi
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'photo' => 'image|file',
            'bankuser_id' => 'required',
            'bank_account' => 'required'
            // 'bank_account' => 'required',
        ]);

        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $validateData['photo'] = $request->file('photo')->store('profile', 'public');
        }

        User::where('id', $id)
            ->update($validateData);
        Alert::success('Berhasil', 'Profil berhasil di update');
        return redirect('/profile-worker');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
