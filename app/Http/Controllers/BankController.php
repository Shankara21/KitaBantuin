<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Bank.index', [
            'banks' => Bank::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:banks|max:255',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);
        Bank::create($validateData);
        Alert::success('Success', 'Bank berhasil ditambah');
        return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('Admin.Bank.show', [
            'bank' => $bank
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('Admin.Bank.edit', [
            'bank' => $bank
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankRequest  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:banks|max:255',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);
        $bank->update($validateData);
        Alert::success('Success', 'Bank berhasil diubah');
        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        Alert::success('Success', 'Bank berhasil dihapus');
        return redirect()->route('bank.index');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Bank::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
