<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', 'Admin')->paginate(10);
        return view('Admin.Admin.index', [
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
        return view('Admin.Admin.create', [
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
            'bank_account' => 'required',
            // 'photo' => 'required|image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validateData['password'] = bcrypt($request->password);
        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('user', 'public');
        }
        User::create($validateData);
        Alert::success('Success', 'Admin berhasil ditambah');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
        // dd($user);
        $user = User::find($id);
        return view('Admin.Admin.show', [
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
    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('Admin.Admin.edit', [
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
    public function update(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:3',
            'role' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'bank_account' => 'numeric',
            // 'photo' => 'nullable|image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        Alert::success('Success', 'Admin berhasil diubah');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        try {
            Storage::delete('public/' . $user->photo);
            $user->delete();
            Alert::success('Success', 'Admin berhasil dihapus');
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") {
                Alert::error('Error', 'Data tidak bisa dihapus karena masih digunakan di tabel lain');
            }
        }
        return redirect()->route('admin.index');
    }
}
