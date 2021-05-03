<?php

namespace App\Modules\Project\Controllers\Web;

use App\Http\Controllers\Controller;
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
        return view($this->views . 'index');

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

        return view($this->views . 'project', $data);
    }

}
