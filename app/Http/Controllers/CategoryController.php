<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => "Get categories success!",
            'data' => Category::all()
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);
        // $validateData['slug'] = Str::slug($validateData(['name']));
        $validateData['slug'] = Str::slug($validateData['name']);
        Category::create($validateData);
        return response()->json([
            'message' => "Category baru berhasil ditambahkan!",
            'data' => $validateData
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json([
            'message' => 'Success get data of ' . $category->name,
            'data' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // $validateData['slug'] = Str::slug($validateData(['name']));
        $validateData['slug'] = Str::slug($validateData['name']);
        Category::where('id', $category->id)->update($validateData);
        return response()->json([
            'message' => "Role " . $category->name . " berhasil diubah!",
            'data' => $validateData
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        // try {
        //     $category->delete();
        //     alert()->success('SuccessAlert', 'Data Berhasil dihapus.');
        // } catch (\Exception $e) {
        //     if ($e->getCode() == "23000") {
        //         alert()->error('ErrorAlert', 'Data tidak bisa dihapus karena berelasi ditabel lain.');
        //     }
        // }
        $category->delete();
        return response()->json([
            'message' => "Data " . $category->name . " berhasil dihapus!"
        ]);
    }
}
