<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('technologies', 'type')->orderBy('id', 'desc')->paginate(20);
        return response()->json([
            'status' => true,
            'response' => $projects
        ]);
    }
}
