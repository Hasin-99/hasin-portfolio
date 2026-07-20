<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicInfo;

class AcademicInfoController extends Controller
{
    function index(){
        $projects = AcademicInfo::all();
        return view('academic-info', compact('projects'));
    }

    function store(Request $request){
        $projectName = $request->project_name;
        $tool = $request->tool;
        $project = new AcademicInfo();
        $project->name = $projectName;
        $project->tool = $tool;
        $project->save();
    }
}