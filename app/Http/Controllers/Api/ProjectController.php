<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('technologies', 'type')->paginate(8);
        return response()->json([
            'status' => true,
            'response' => $projects
        ]);
    }

    public function show(String $slug){
        $project = Project::with('technologies', 'type')->where('project_name_slug', '=', $slug)->first();
        return response()->json([
            'status' => true,
            'response' => $project
        ]);
    }

    public function random(){
        $projects = Project::with('technologies', 'type')->inRandomOrder()->take(4)->get();
        return response()->json([
            'status' => true,
            'response' => $projects
        ]);
    }
}