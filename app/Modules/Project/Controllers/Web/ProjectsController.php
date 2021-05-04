<?php

namespace App\Modules\Project\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Project\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectsController extends Controller
{
    public $model, $views, $module, $module_url, $title;

    public const ColorSechma = [
        'dark' => ['site-layout' => 'dark', 'menu-layout' => 'light'],
        'light' => ['site-layout' => 'light', 'menu-layout' => 'dark']
    ];

    public function __construct(Project $model)
    {
        $this->views = $this->module = 'Project::Web.';
        $this->title = trans('Project.Project ');
        $this->module_url = '/project/';
        $this->model = $model;
    }

    public function index()
    {
         $projects = Project::with('Sections.Components.Fields')
            ->with('Sections.Components.ComponentTemplate.templateFields')->get();
                $data['categories']=Category::HeaderCategories()->get();
        return view($this->views . 'index' , $data);
    }

    public function getCategoryProjects($id = null)
    {

        if ($id){
            $data['category'] = Category::findOrFail($id);
            $category_name = $data['category']->name ;
            $data['rows'] =$this->model->where('category_id' , $id)->orderBy('id' , 'desc')->get();
        }else{
            $category_name = 'All';
            $data['rows'] =$this->model->orderBy('id' , 'desc')->get();
        }
        $data['categories']=Category::HeaderCategories()->get();
        $data['page_title']=$category_name. ' Projects';
        return view($this->views . 'category-projects' , $data);
    }

    public function getProject($id)
    {

        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        try {
            $data['row'] = Project::with('Sections.Components.Fields')
                ->with('Sections.Components.ComponentTemplate.templateFields')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            flash(trans('project with Id' . $id . ' not found '))->error();
            return back();
        }
        $data['row']->is_active = 1;
        $data['page_title'] = $this->title . $data['row']->name;
        $data['page_description'] = trans('projects.page description');
        $data['SchemaType'] = ProjectsController::ColorSechma;
        $data['categories']=Category::HeaderCategories()->get();

        return view($this->views . 'project', $data);
    }

}
