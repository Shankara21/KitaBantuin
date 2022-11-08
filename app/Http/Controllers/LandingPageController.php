<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Pengajuan;
use App\Models\Testimoni;
use App\Models\Portofolio;
use App\Models\SubCategory;
use App\Models\WorkerDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TestimoniResource;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function home()
    {
        return view('landingPage.home', [
            'testimonis' => Testimoni::all()
        ]);
    }
    public function service()
    {
        return view('landingPage.service');
    }
    public function about()
    {
        return view('landingPage.about', [
            'testimonis' => Testimoni::all()
        ]);
    }
    public function contact()
    {
        return view('landingPage.contact', [
            'testimonis' => Testimoni::all()
        ]);
    }
    public function worker()
    {
        // $testimoni = \App\Models\Testimoni::with(['user']);
        // dd($testimoni->get());
        $check = User::where('role', 'Worker')->get();
        if ($check ?? false) {
            $target = WorkerDetail::where('status', 'Accepted')->get();
        }
        if (Auth::user()) {
            $check = WorkerDetail::where('user_id', Auth::user()->id)->first();
        }

        return view('landingPage.worker', [
            'workers' => $target,
            'check' => $check ?? null
        ]);
    }
    public function profile()
    {
        return view('landingPage.profile', [
            'user' => auth()->user()
        ]);
    }
    public function profileWorker()
    {
        $tes = WorkerDetail::where('user_id', auth()->user()->id)->first();

        //    memecah isi dari skill dari koma
        if ($tes) {
            $skill = explode(',', $tes->skill);
        }

        return view('landingPage.profile-worker', [
            'user' => auth()->user(),
            'portofolios' => Portofolio::where('user_id', auth()->user()->id)->get(),
            'details' => $tes,
            'skill' => $skill ?? null
        ]);
    }
    public function project()
    {
        // $target = Project::with(['subCategory'])->where('id', 1)->first();
        // dd($target->user);
        return view('landingPage.projects', [
            'projects' => Project::latest()->filter(request(['search', 'subCategory', 'author']))->paginate(7)->withQueryString(),
        ]);
    }
    public function detailProject($id)
    {
        $project = Project::with(['subCategory'])->where('title', $id)->first();
        $bids = Bid::where('project_id', $project->id)->get();
        return view('landingPage.detail-project', [
            'project' => $project,
            'subCategory' => SubCategory::find($id),
            'bid' => $bids,
            'total_bid' => $bids->count()
        ]);
    }
    public function createProject()
    {
        return view('landingPage.create-project', [
            'categories' => SubCategory::all()
        ]);
    }
    public function myBid()
    {
        $target = Bid::where('user_id', auth()->user()->id)->get();
        return view('landingPage.myBid', [
            'bids' => $target
        ]);
    }
    public function detailWorker($id)
    {
        $target = User::where('id', $id)->first();
        $portofolio = Portofolio::where('user_id', $id)->get();
        $details = WorkerDetail::where('user_id', $id)->first();
        return view('landingPage.detail-worker', [
            'worker' => $target,
            'portofolio' => $portofolio,
            'details' => $details
        ]);
    }

    public function listProject()
    {
        $open = Project::where('user_id', auth()->user()->id)->where('status', 'Open')->get();
        $onProcess =
            Project::where('user_id', auth()->user()->id)->where('status', 'onProcess')->get();
        $done =
            Project::where('user_id', auth()->user()->id)->where('status', 'Done')->get();
        return view('landingPage.myProjects', [
            'projectsOpen' => $open,
            'projectsOnProcess' => $onProcess,
            'projectsDone' => $done
        ]);
    }
    public function detailMyProject($id)
    {
        $project = Project::with(['subCategory'])->where('title', $id)->first();
        $bids = Bid::where('project_id', $project->id)->get();

        // Menghitung perbedaan hari antara deadline dan created_at
        $date1 =  date('Y-m-d H:i:s');
        $datetest = date_create($date1);
        $date2 = date_create($project->deadline);
        $diff = date_diff($datetest, $date2);
        $day = $diff->format("%a");
        return view('landingPage.detail-myprojects', [
            'project' => $project,
            'bid' => $bids,
            'total_bid' => $bids->count(),
            'day' => $day
        ]);
    }
    public function submitWorker()
    {
        return view('landingPage.submit-worker', [
            'categories' => SubCategory::all(),
            'skills' => Skill::all()
        ]);
    }
    public function processWorker(Request $request)
    {
        $validateUserData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'image|file|max:2048',
            'bank_account' => 'required',

        ]);
        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $validateUserData['photo'] = $request->file('photo')->store('profile', 'public');
        }
        User::where('id', auth()->user()->id)->update($validateUserData);

        $validateDataPengajuan = $request->validate([
            'cv' => 'image|file',
            'ktp' => 'image|file',
            'about' => 'required',
            'skill' => 'required|array'
        ]);
        if ($request->file('cv')) {
            $validateDataPengajuan['cv'] = $request->file('cv')->store('pengajuan', 'public');
        }
        if ($request->file('ktp')) {
            $validateDataPengajuan['ktp'] = $request->file('ktp')->store('pengajuan', 'public');
        }
        $validateDataPengajuan['skill'] = implode(', ', $request->skill);
        $validateDataPengajuan['user_id'] = auth()->user()->id;
        WorkerDetail::create($validateDataPengajuan);

        return redirect()->route('worker')->with('success', 'Data berhasil diubah');
    }
}
