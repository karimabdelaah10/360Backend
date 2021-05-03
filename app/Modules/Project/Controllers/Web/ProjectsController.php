<?php

namespace App\Modules\Project\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Project\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    private $model;
    public function __construct(Project  $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $projects=Project::with('sections.components')->get();
        return view('project');
       //       return $projects;
    }

    public function getCategoryProjects($id)
    {
        $data['rows'] =$this->model->where('category_id' , $id)
            ->orderBy('id' , 'desc')->get();


        return $data;
    }
}
