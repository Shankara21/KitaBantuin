<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LandingPageProject extends Controller
{
    // TODO Function Create Project
    public function createProject(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'sub_categories_id' => 'required',
        ]);
        $start = number_format($request->start);
        $end = number_format($request->end);
        $validateData['budget'] = 'Rp.' . $start . ' - Rp.' . $end;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['description'] = $request->editor1;
        $validateData['status'] = 'Open';
        $validateData['excerpt'] = Str::limit(strip_tags($request->editor1), 350);

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
            Alert::error('Gagal', 'Bid gagal dibuat');
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


        $project->status = 'onProcess';
        $project->save();
        $bid = Bid::where('id', $request->bid_id)->first();
        $bid->status = 'Accepted';
        $bid->save();
        Alert::success('Success', 'Bid diterima');
        return redirect('/list-project');
    }
}
