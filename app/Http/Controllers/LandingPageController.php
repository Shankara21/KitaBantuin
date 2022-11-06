<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use App\Models\Project;
use App\Models\Testimoni;
use App\Models\SubCategory;
use App\Models\WorkerDetail;
use Illuminate\Http\Request;
use App\Http\Resources\TestimoniResource;
use App\Models\Portofolio;

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
        // $testimoni = Testimoni::with(['user']);
        // dd($testimoni->get());
        $target = User::with(['workerDetail', 'portofolio'])->where('role', 'Worker')->get();
        // dd($target);
        return view('landingPage.worker', [
            'workers' => $target
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
        return view('landingPage.profile-worker', [
            'user' => auth()->user()
        ]);
    }
    public function project()
    {
        // $target = Project::with(['subCategory'])->where('id', 1)->first();
        // dd($target->user);

        return view('landingPage.projects', [
            'projects' => Project::orderBy('created_at', 'DESC')->paginate(6),

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
}
