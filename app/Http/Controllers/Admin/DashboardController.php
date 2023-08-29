<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class DashboardController extends Controller
{
    public function index(){
        $types=Type::limit(5)
            ->orderBy("id", 'asc')
            ->get();
        $projects=Project::limit(5)
            ->orderBy("id", 'desc')
            ->get();
        $technologies=Technology::limit(5)
            ->orderBy("id", 'asc')
            ->get();
        return view('admin.dashboard', compact('projects', 'types', 'technologies'));
    }
}
