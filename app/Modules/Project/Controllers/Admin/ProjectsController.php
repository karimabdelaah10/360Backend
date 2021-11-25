<?php

namespace App\Modules\Project\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Project\Models\ComponentTemplate;
use App\Modules\Project\Models\Project;
use App\Modules\Project\Requests\ProjectsRequest;

class ProjectsController extends Controller
{
    public $model, $views, $module, $module_url, $title;

    public function __construct(Project $model)
    {
        $this->views = $this->module = 'Project::Admin.';
        $this->title = trans('app.Projects');
        $this->module_url = '/admin/projects';
        $this->model = $model;
    }

    public function getIndex()
    {
        $projects = Project::with('sections.components')->get();
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('projects.page description');
        $data['rows'] = $this->model->getData()
            ->orderBy("id", "DESC")
            ->paginate(request('per_page'));

        return view($this->views . 'index', $data);
    }

    public function getView($id)
    {
        $data['section_module_url'] = $this->module_url . '/sections'; // for action field
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model
            ->with('Sections.Components.Fields')
            ->with('Sections.Components.ComponentTemplate.templateFields')
            ->findOrFail($id);
        $data['categories'] = Category::all()->pluck('name', 'id');
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . 'view', $data);
    }


    public function getCreate()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        $data['categories'] = Category::whereHas('parent')->pluck('name', 'id');
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . 'create', $data);
    }

    public function postCreate(ProjectsRequest $request)
    {
        $currentIndex = Project::count() + 1;
        $newIndex = $request->homepage_order;
        $request['homepage'] = $request->homepage ? 1 : 0;
        if ($project = $this->model->create($request->all())) {
            reArrangeIndex(
                $currentIndex,
                $newIndex,
                $project->id,
                $this->model,
                'homepage_order'
            );
            flash(trans('app.created successfully'))->success();
            return redirect($this->module_url . '/complete/' . $project->id);
        }
    }

    public function getEdit($id)
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model
            ->with('Sections.Components.Fields')
            ->with('Sections.Components.ComponentTemplate.templateFields')
            ->findOrFail($id);
        $data['row']->is_active = 1;
        $data['wrappers_type'] = SectionsController::getSectionWrapperTypes();
        $data['componentsTemplate'] = ComponentTemplate::with('templateFields')->get();
        $data['categories'] = Category::whereHas('parent')->pluck('name', 'id');
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . 'edit', $data);
    }


    public function postEdit(ProjectsRequest $request, $id)
    {
        $request['homepage'] = $request->homepage ? 1 : 0;
        $row = $this->model->findOrFail($id);
        $currentIndex = $row->homepage_order;
        $newIndex = $request->homepage_order;
        if ($row->update($request->all())) {
            reArrangeIndex(
                $currentIndex,
                $newIndex,
                $row->id,
                $this->model,
                'homepage_order'
            );
            flash(trans('app.update successfully'))->success();
            return back();
        }
    }

    public function getDelete($id)
    {
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash(trans('app.deleted successfully'))->success();
        return back();
    }

    public function getCompleteProject($id)
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url; // for action field
        $data['section_module_url'] = $this->module_url . '/sections'; // for action field
        $data['views'] = $this->views;
        $data['row'] = $this->model
            ->with('Sections.Components.Fields')
            ->with('Sections.Components.ComponentTemplate.templateFields')
            ->findOrFail($id);
        $data['row']->is_active = 1;
        $data['all_projects'] = $this->model->all()->pluck('name', 'id');
        $data['wrappers_type'] = SectionsController::getSectionWrapperTypes();
        $data['componentsTemplate'] = ComponentTemplate::with('templateFields')->get();
        $data['categories'] = Category::all()->pluck('name', 'id');
        $data['page_title'] = trans('projects.complete');
        $data['breadcrumb'] = [
            $this->title => $this->module_url,
            trans('app.view') . " " . $this->title => $this->module_url . '/view/' . $id
        ];

        return view($this->views . 'complete', $data);
    }
}
