<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
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
}
