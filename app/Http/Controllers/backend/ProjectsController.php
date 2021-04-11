<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {



//        $projects=Project::with('sections.components')->find(1);
       return view('project');
       //       return $projects;
    }
}
