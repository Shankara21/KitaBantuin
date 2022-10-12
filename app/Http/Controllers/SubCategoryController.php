<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => "Get Sub Categories success!",
            'data' => SubCategory::all()
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
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'category_id' => 'required'
        ]);
        $validateData['slug'] = Str::slug($validateData['name']);
        SubCategory::create($validateData);
        return response()->json([
            'message' => "Category baru berhasil ditambahkan!",
            'data' => $validateData
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        $references = Category::where('id', $subCategory->category_id)->get();
        return response()->json([
            'message' => "Get Sub Categories " . $subCategory->name . " success!",
            'data' => $subCategory,
            'references' => $references
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
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
            'name' => 'required|string|max:255|unique:roles',
        ]);
        $validateData['slug'] = Str::slug($validateData['name']);
        SubCategory::where('id', $subCategory->id)->update($validateData);
        return response()->json([
            'message' => "Role " . $subCategory->name . " berhasil diubah!",
            'data' => $validateData
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subcategory = SubCategory::findOrFail($subCategory->id);
        // try {
        //     $subcategory->delete();
        //     alert()->success('SuccessAlert', 'Data Berhasil dihapus.');
        // } catch (\Exception $e) {
        //     if ($e->getCode() == "23000") {
        //         alert()->error('ErrorAlert', 'Data tidak bisa dihapus karena berelasi ditabel lain.');
        //     }
        // }
        $subcategory->delete();
        return response()->json([
            'message' => "Data " . $subCategory->name . " berhasil dihapus!"
        ]);
    }
}
