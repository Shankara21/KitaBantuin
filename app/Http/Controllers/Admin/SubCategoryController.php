<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategory = SubCategory::paginate(10);
        return view('Admin.SubCategory.index', [
            'title' => 'SubCategory',
            'subCategories' => $subCategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('Admin.SubCategory.create', [
            'title' => 'Create SubCategory',
            'categories' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:sub_categories|max:255',
            'category_id' => 'required',
        ]);
        SubCategory::create($validateData);
        Alert::success('Success', 'SubCategory berhasil ditambah');
        return redirect()->route('subCategories.index');
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
        $category = Category::all();
        return view('Admin.SubCategory.edit', [
            'title' => 'Edit SubCategory',
            'subCategory' => $subCategory,
            'categories' => $category
        ]);
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
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
        ]);
        $subCategory->update($validateData);
        Alert::success('Success', 'SubCategory berhasil diubah');
        return redirect()->route('subCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        try {
            $subCategory->delete();
            Alert::success('Success', 'SubCategory berhasil dihapus');
        } catch (\Exception $e){
        if($e->getCode() == "23000"){
            Alert::error('Error', 'Data tidak bisa dihapus karena masih digunakan di tabel lain');
        }}
        return redirect()->route('subCategories.index');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(SubCategory::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
