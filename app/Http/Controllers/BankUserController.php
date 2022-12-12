<?php

namespace App\Http\Controllers;

use App\Models\BankUser;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class BankUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.BankUser.index', [
           'banks' => BankUser::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.BankUser.create');
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
            'name' => 'required|unique:bank_users|max:255',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('bank', 'public');
        }

        BankUser::create($validateData);
        Alert::success('Success', 'Bank berhasil ditambah');
        return redirect()->route('bank-user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BankUser $bankUser)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BankUser $bankUser)
    {
        return view('Admin.BankUser.edit', [
            'bank' => $bankUser
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankUser $bankUser)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        if($request->file('image')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('bank', 'public');
        }

        $bankUser->update($validateData);
        Alert::success('Success', 'Bank berhasil diupdate');
        return redirect()->route('bank-user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankUser $bankUser)
    {
        $bankUser->delete();
        Alert::success('Success', 'Bank berhasil dihapus');
        return redirect()->route('bank-user.index');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(BankUser::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
