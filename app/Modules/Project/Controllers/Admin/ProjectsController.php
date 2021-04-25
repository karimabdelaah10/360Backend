<?php

namespace App\Modules\Project\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Jobs\Requests\JobsRequest;
use App\Modules\Project\Models\Project;
use App\Modules\Project\Requests\ProjectsRequest;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public $model,$views,$module,$module_url,$title;

    public function __construct(Project $model) {
        $this->views = $this->module = 'Project::Admin.';
        $this->title = trans('app.Projects');
        $this->module_url = '/admin/projects';
        $this->model = $model;
    }
    public function getIndex()
    {
        $projects=Project::with('sections.components')->get();
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('projects.page description');
        $data['rows'] = $this->model->getData()
            ->orderBy("id","DESC")
            ->paginate(request('per_page'));

        return view($this->views . 'index' , $data);
    }

    public function getView($id)
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model
            ->with('Sections.Components.Fields')
            ->with('Sections.Components.ComponentTemplate.templateFields')
            ->findOrFail($id);
        $data['categories'] = Category::all()->pluck('name','id');
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . 'view', $data);

    }


    public function getCreate(){

        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['categories'] = Category::all()->pluck('name','id');
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . 'create' , $data);
    }

    public function postCreate(ProjectsRequest $request) {
        if ($this->model->create($request->all())){
            flash(trans('app.created successfully'))->success();
            return back();
        }
    }

    public function getEdit($id) {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model->findOrFail($id);
        $data['row']->is_active = 1;
        $data['categories'] = Category::all()->pluck('name','id');
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . 'edit' , $data);
    }


    public function postEdit(JobsRequest $request , $id) {
        $row = $this->model->findOrFail($id);
        if ($row->update($request->all())){
            flash(trans('app.update successfully'))->success();
            return back();
        }
    }
    public function getDelete($id)
    {
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }



}
