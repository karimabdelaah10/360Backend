<?php

namespace App\Modules\Project\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Project\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {



        $projects=Project::with('sections.components')->get();
        return view('project');
       //       return $projects;
    }
}
