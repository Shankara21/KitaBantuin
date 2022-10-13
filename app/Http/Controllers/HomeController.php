<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $worker = User::where('role', 'Worker')->count();
        $user = User::where('role', 'User')->count();
        $category = Category::count();
        $project = Project::count();
        return view('home', [
            'worker' => $worker,
            'user' => $user,
            'category' => $category,
            'project' => $project
        ]);
    }
}
