<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Testimoni;
use Illuminate\Support\Str;
use App\Models\WorkerDetail;
use Illuminate\Http\Request;
use App\Models\Project_result;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LandingPageProject extends Controller
{
    // TODO Function Create Project
    public function createProject(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'sub_categories' => 'required|array',
        ]);
        $start = number_format($request->start);
        $end = number_format($request->end);
        $validateData['budget'] = 'Rp.' . $start . ' - Rp.' . $end;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['description'] = $request->editor1;
        $validateData['status'] = 'Open';
        $validateData['excerpt'] = Str::limit(strip_tags($request->editor1), 350);
        $validateData['sub_categories'] = implode(', ', $request->sub_categories);
        Project::create($validateData);

        Alert::success('Success', 'Project berhasil dibuat');
        return redirect('/list-project');
    }
    // TODO Function Create Bid
    public function createBid(Request $request)
    {
        $project = Project::find($request->project_id);
        $dataAwal = $project->budget;

        // di explode
        $data = explode('-', $dataAwal);
        // memisahkan antara angka dan huruf
        $new1 = explode('Rp.', $data[0]);
        $new2 = explode('Rp.', $data[1]);

        $barulagi1 = explode(',', $new1[1]);
        $barulagi2 = explode(',', $new2[1]);

        // Menggabungkan data dari array
        $hasil = implode($barulagi1);
        $hasil2 = implode($barulagi2);
        $min = (int)$hasil;
        $max = (int)$hasil2;

        $awal = (int)$request->price;

        if ($awal < $min || $awal > $max) {
            Alert::error('Gagal', 'Harga yang anda masukkan tidak sesuai dengan budget');
            return redirect()->back();
        }

        $validateData = $request->validate([
            'project_id' => 'required',
            'price' => 'required',
        ]);
        $validateData['deadline'] = date('Y-m-d');
        $validateData['user_id'] = auth()->user()->id;
        Bid::create($validateData);
        Alert::success('Success', 'Bid berhasil');
        return redirect('/list-project');
    }

    // TODO Function Accept Bid
    public function acceptBid(Request $request)
    {
        $project = Project::where('id', $request->project_id)->first();

        $project->worker_id = $request->worker_id;
        $project->status = 'onProcess';

        $project->save();
        $bid = Bid::where('id', $request->bid_id)->first();
        $bid->status = 'Accepted';
        $bid->save();
        Alert::success('Success', 'Bid diterima');
        return redirect('/myProject');
    }

    // TODO Function Submit Project
    public function submitProject(Request $request)
    {
        // $project = Project::where('id', $request->project_id)->first();
        // $project->status = 'Done';
        // $project->save();

        $validateData = $request->validate([
            'project_id' => 'required',
            'image' => 'image|file',
            'link' => 'required',
        ]);
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('project_result', 'public');
        }
        $validateData['worker_id'] = auth()->user()->id;
        Project_result::create($validateData);
        Alert::success('Success', 'Project berhasil di submit');
        return redirect('/myBid');
    }

    // TODO function submit payment
    public function submitPayment(Request $request)
    {
        $project = Project::where('id', $request->project_id)->first();
        $project->status = 'Done';
        $project->save();
        $projectName = $project->title;
        $workerDetail = WorkerDetail::where('user_id', $project->worker_id)->first();
        $pointNow = $workerDetail->point;
        $point = $pointNow + 2;
        $workerDetail->point = $point;
        $workerDetail->save();
        $validateData = $request->validate([
            'project_id' => 'required',
            'bukti_transfer' => 'image|file',
            'bank_id' => 'required',
            'bid_id' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
        ]);
        $validateData['potongan'] = $request->amount * 0.1;
        if ($request->file('bukti_transfer')) {
            $validateData['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
        }
        Payment::create($validateData);
        Alert::success('Success', 'Payment berhasil di submit');
        return redirect('/detail-myProject/' . $projectName);
    }

    // TODO function submit testimoni
    public function submitTestimoni(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'description' => 'required',
        ]);
        $validateDataTestimoni = $request->validate([
            'project_id' => 'required',
            'description' => 'required',
        ]);
        $validateDataTestimoni['user_id'] = Auth::user()->id;
        $project = Project::where('id', $request->project_id)->first();
        $project->rating = $request->rating;
        $project->save();

        $countProject = Project::where('worker_id',  $project->worker_id)->count();
        $sumRating = Project::where('worker_id',  $project->worker_id)->sum('rating');


        $tes = WorkerDetail::where('user_id', $project->worker_id)->first();
        if ($countProject > 0 && $sumRating > 0) {
            $rating = $sumRating / $countProject;
            $tes->point = $tes->point + $rating;
            $tes->rating = $rating;
            $tes->save();
        }

        Testimoni::create($validateDataTestimoni);
        Alert::success('Success', 'Testimoni berhasil di submit');
        return redirect('/detail-myProject/' . $project->title);
    }
}
