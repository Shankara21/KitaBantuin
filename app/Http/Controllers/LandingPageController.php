<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('landingPage.worker', [
            'workers' => User::where('role', 'Worker')->get()
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
        return view('landingPage.projects');
    }
    public function detailProject()
    {
        return view('landingPage.detail-project');
    }
    public function createProject()
    {
        return view('landingPage.create-project', [
            'categories' => SubCategory::all()
        ]);
    }
}
