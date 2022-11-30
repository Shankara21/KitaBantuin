<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Project_result;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $result = Project_result::where('id', $id)->first();
        return view('Admin.Payment.create', [
            'title' => 'Admin-Payment',
            'result' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = Project_result::where('id', $id)->first();
        $project = Project::where('id', $result->id)->first();

        $validatePayment = $request->validate([
            'amount' => 'required',
            'bukti_transfer' => 'image|file'

        ]);
        $validatePayment['user_id'] = auth()->user()->id;
        $validatePayment['project_id'] = $project->id;
        $validatePayment['bank_id'] = $request->bank_id;
        $validatePayment['status'] = 'Accepted';
        $validatePayment['jenis'] = 'Pengeluaran';
        if($request->file('bukti_transfer')){
            $validatePayment['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
        }
        Payment::create($validatePayment);

        $payId = Payment::where('project_id', $project->id)->latest()->first();
        $id = $payId->id;
        $am = $payId->amount;
        Balance::create([
            'payment_id' => $id,
            'status' => 'Pengeluaran',
            'total_profit' => $am
        ]);

        Alert::success('Berhasil', 'Pembayaran Worker Berhasil!');
        return redirect('/payment');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
