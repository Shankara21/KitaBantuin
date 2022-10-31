<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageProject extends Controller
{
    public function createProject(Request $request){
        $validateData = $request -> validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'sub_categories_id' => 'required',
        ]);
    }
}
