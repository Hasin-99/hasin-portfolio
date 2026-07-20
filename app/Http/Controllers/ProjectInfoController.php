<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectInfoController extends Controller
{
    function index(){
        $projects = Project::all();

        return view('projects', compact('projects'));
    }

    function store(Request $request){
        $projectName = $request->project_name;
        $tool = $request->tool;

        $project = new Project();
        $project->name = $projectName;
        $project->tool = $tool;
        $project->save();
        dd("Project saved successfully!");
    }
    
}