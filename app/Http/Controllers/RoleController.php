<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => "Get all roles success!",
            'data' => Role::all()
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
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);
        $validateData['slug'] = Str::slug($validateData['name']);
        Role::create($validateData);
        return response()->json([
            'message' => "Role baru berhasil ditambahkan!",
            'data' => $validateData
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return response()->json([
            'message' => "Get role " . $role->name . " success!",
            'data' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);
        $validateData['slug'] = Str::slug($validateData['name']);
        Role::where('id', $role->id)->update($validateData);
        return response()->json([
            'message' => "Data role " . $role->name . " berhasil diubah!",
            'data' => $validateData
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $role = Role::findOrFail($role->id);
        // try {
        //     $role->delete();
        //     alert()->success('SuccessAlert', 'Data Berhasil dihapus.');
        // } catch (\Exception $e) {
        //     if ($e->getCode() == "23000") {
        //         alert()->error('ErrorAlert', 'Data tidak bisa dihapus karena berelasi ditabel lain.');
        //     }
        // }
        $role->delete();
        return response()->json([
            'message' => "Data " . $role->name . " berhasil dihapus!"
        ]);
    }
}
