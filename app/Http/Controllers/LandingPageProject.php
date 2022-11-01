<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Project;
use Illuminate\Http\Request;

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

        Project::create($validateData);

        return redirect()->route('list-project')->with('success', 'Project created successfully');
    }
    // TODO Function Create Bid
    public function createBid(Request $request)
    {
        $validateData = $request->validate([
            'project_id' => 'required',
            'price' => 'required',
        ]);
        $validateData['deadline'] = date('Y-m-d');
        $validateData['user_id'] = auth()->user()->id;
        Bid::create($validateData);
        return redirect()->route('list-project')->with('success', 'Bid created successfully');
    }
}
