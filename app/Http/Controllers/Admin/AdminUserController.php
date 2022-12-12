<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', 'User')->paginate(10);
        return view('Admin.User.index', [
            'users' => $user,
            'title' => 'User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.create', [
            'title' => 'Create User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'role' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'bank_account' => 'nullable',
            // 'photo' => 'nullable|image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validateData['password'] = bcrypt($request->password);
        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('user', 'public');
        }
        User::create($validateData);
        Alert::success('Success', 'Client berhasil ditambah');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Admin.User.show', [
            'user' => $user,
            'title' => 'Detail User'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.User.edit', [
            'user' => $user,
            'title' => 'Edit User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:3',
            'role' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'bank_account' => 'nullable|numeric',
            'photo' => 'nullable|image|file|max:2048',
        ]);
        if ($request->password) {
            $validateData['password'] = bcrypt($request->password);
        } else {
            $validateData['password'] = $user->password;
        }
        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $validateData['photo'] = $request->file('photo')->store('user', 'public');
        }
        User::where('id', $user->id)->update($validateData);
        Alert::success('Success', 'Client berhasil diubah');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        try {
            Storage::delete('public/' . $user->photo);
            User::destroy($user->id);
            Alert::success('Success', 'User berhasil dihapus');
        } catch (\Exception $e){
        if($e->getCode() == "23000"){
            Alert::error('Error', 'Data tidak bisa dihapus karena masih digunakan di tabel lain');
        }}
        return redirect()->route('user.index');
    }
}
