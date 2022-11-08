<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategory = Testimoni::paginate(10);
        return view('Admin.Testimoni.index', [
            'title' => 'Testimoni',
            'testimonis' => $subCategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(SubCategory::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
