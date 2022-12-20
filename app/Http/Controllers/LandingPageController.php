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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Resources\TestimoniResource;
use App\Models\Bank;
use App\Models\BankUser;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Project_result;

class LandingPageController extends Controller
{
    public function home()
    {
        return view('landingPage.home', [
            'testimonis' => Testimoni::all(),
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
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
            $topWorker = WorkerDetail::where('point', '>=', 50)->where('status', 'Accepted')->orderBy('point', 'DESC')->get();
        }
        if (Auth::user()) {
            $check = WorkerDetail::where('user_id', Auth::user()->id)->first();
        }
        $portofolio = Portofolio::all();
        return view('landingPage.worker', [
            'workers' => $target,
            'check' => $check ?? null,
            'portofolios' => $portofolio,
            'topWorkers' => $topWorker ?? null,
            // 'portofolios' => Portofolio::where('worker_details_id', $target->id)->get(),
        ]);
    }
    public function profile()
    {
        return view('landingPage.profile', [
            'user' => auth()->user(),
            'bank' => BankUser::all(),
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
            'portofolios' => Portofolio::where('worker_details_id', $tes->id)->get() ?? null,
            'details' => $tes,
            'skill' => $skill ?? null,
            'bank' => BankUser::all(),
        ]);
    }
    public function project(Request $request)
    {
        // $target = Project::with(['subCategory'])->where('id', 1)->first();
        // dd($target->user);
        // dd($request->all());
        $target = Project::where('status', 'Open');



        if ($request->filter_category) {
            $category = SubCategory::where('name', $request->filter_category)->first();
            $target = Project::where('sub_categories', $category->name);
        }
        if ($request->deadline) {
            $category = SubCategory::where('name', $request->filter_category)->first();
            $target = Project::where('deadline', '>=', $request->deadline);
        }
        return view('landingPage.projects', [
            'projects' => $target->latest()->filter(request(['search', 'author']))->paginate(7)->withQueryString(),
            'categories' => SubCategory::all(),
        ]);
    }
    public function detailProject($id)
    {
        $project = Project::with(['subCategory'])->where('title', $id)->first();
        $bids = Bid::where('project_id', $project->id)->get();
        $checkWorker = WorkerDetail::where('user_id', Auth::user()->id)->first();

        return view('landingPage.detail-project', [
            'project' => $project,
            'subCategory' => SubCategory::find($id),
            'bid' => $bids,
            'total_bid' => $bids->count(),
            'checkWorker' => $checkWorker ?? null
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
    public function detailWorker(User $user)
    {
        $target = User::where('id', $user->id)->first();
        $details = WorkerDetail::where('user_id', $user->id)->first();
        $portofolio = Portofolio::where('worker_details_id', $details->id)->get();
        $projectResult = Project_result::where('worker_id', $target->id)->get();
        return view('landingPage.detail-worker', [
            'worker' => $target,
            'portofolio' => $portofolio,
            'details' => $details,
            'projectResult' => $projectResult
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

        // if ($project->status == 'onProcess') {
        // }
        $check = Bid::where('project_id', $project->id)->where('status', 'Accepted')->first();

        $projectResult = Project_result::where('project_id', $project->id)->first();

        $payment = Payment::where('project_id', $project->id)->first();

        $testimoni = Testimoni::where('project_id', $project->id)->first();

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
            'day' => $day,
            'oneBid' => $check ?? null,
            'projectResult' => $projectResult ?? null,
            'payment' => $payment ?? null,
            'testimoni' => $testimoni ?? null
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

        Alert::success('Success', 'Pengajuan anda berhasil dikirim.');
        return redirect('/list-worker');
    }
    public function bidDetails($id)
    {
        $target = Bid::where('id', $id)->first();
        $project = Project::where('id', $target->project_id)->first();
        $projectResult = Project_result::where('project_id', $project->id)->first();
        // diff date deadline and now
        $date1 =  date('Y-m-d H:i:s');
        $datetest = date_create($date1);
        $date2 = date_create($project->deadline);
        $diff = date_diff($datetest, $date2);
        $day = $diff->format("%a");

        return view('landingPage.bid-details', [
            'bid' => $target,
            'project' => $project,
            'day' => $day,
            'projectResult' => $projectResult ?? null
        ]);
    }

    // public function rating(Request $request)
    // {
    //     $point = 2;
    //     $totalPoint = $request->rating * $point;
    //     WorkerDetail::where('user_id', auth()->user()->id)
    //         ->update([
    //             'rating' => $request->rating,
    //             'point' => $totalPoint,
    //         ]);

    //     Alert::success('Success', 'Rating berhasil ditambah');
    //     return redirect('/profile-worker');
    // }

    public function getPayment($id)
    {
        $bid = Bid::where('id', $id)->first();
        $bank = Bank::all();
        $project = Project::where('id', $bid->project_id)->first();
        $projectResult = Project_result::where('project_id', $project->id)->first();
        return view('landingPage.payment', [
            'bid' => $bid,
            'bank' => $bank,
            'project' => $project,
            'projectResult' => $projectResult ?? null
        ]);
    }

    public function videoConference()
    {
        return view('landingPage.video-conference');
    }
}
