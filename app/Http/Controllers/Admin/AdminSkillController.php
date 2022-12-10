<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Skill::paginate(10);
        return view('Admin.Skill.index', [
            'title' => 'Skills',
            'skills' => $skill
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Skill.create', [
            'title' => 'Create Skill'
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
            'name' => 'required|unique:skills|max:255',
        ]);
        Skill::create($validateData);
        Alert::success('Success', 'Skill berhasil ditambah');
        return redirect()->route('skill.index');
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
    public function edit(Skill $skill)
    {
        return view('Admin.Skill.edit', [
            'title' => 'Edit Skill',
            'skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $skill->update([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'Skill berhasil diubah');
        return redirect()->route('skill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        try {
            $skill->delete();
            Alert::success('Success', 'Skill berhasil dihapus');
        } catch (\Exception $e){
        if($e->getCode() == "23000"){
            Alert::error('Error', 'Data tidak bisa dihapus karena masih digunakan di tabel lain');
        }}
        return redirect()->route('skill.index');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Skill::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
