<?php

namespace App\Modules\Category\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Requests\CategoriesRequest;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use App\Modules\Jobs\Requests\JobsRequest;
use App\Modules\Project\Models\Project;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $model, $views, $module, $module_url, $title;

    public function __construct(Category $model)
    {
        $this->views = $this->module = 'Category::Admin.';
        $this->title = trans('app.categories');
        $this->module_url = '/admin/categories';
        $this->model = $model;
    }

    public function getIndex()
    {

        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('categories.page description');
        $data['rows'] = $this->model->getData()
            ->where('parent_id', null)
            ->orderBy("id", "DESC")
            ->paginate(request('per_page'));

        return view($this->views . 'index', $data);
    }


    public function listProjects($categroy_id)
    {
        $data['rows'] = Project::where('category_id' ,$categroy_id)
            ->orderBy("id", "DESC")
            ->paginate(request('per_page'));
        if (!count($data['rows'])){
            return redirect()->back();
        }
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model->findOrFail($categroy_id);
        $data['row']->is_active = 1;
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = "List ".$data['row']->name." Projects";


        return view($this->views . 'category_projects', $data);
    }

    public function getEditProjectOrder($project_id)
    {
        $data['row'] = Project::findOrFail($project_id);
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['max_count'] = Project::where('category_id' , $data['row']->category_id)->count();
        return view($this->views . 'update_project_order', $data);
    }

    public function postEditProjectOrder(Request $request ,$project_id)
    {
        $project = Project::findOrFail($project_id);
        $project->update(['category_id'=>$project->category_id]);
        flash(trans('app.update successfully'))->success();
        return redirect($this->module_url.'/list-projects/'.$project->category_id);
    }

    public function getCreate()
    {

        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        $data['parents'] =$this->model->whereNull('parent_id')->pluck('name' ,'id');
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . 'create', $data);
    }

    public function postCreate(CategoriesRequest $request)
    {
        if ($this->model->create($request->all())) {
            flash(trans('app.created successfully'))->success();
            return redirect( $this->module_url);
        }
    }

    public function getEdit($id)
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model->findOrFail($id);
        $data['row']->is_active = 1;
        $data['parents'] =$this->model->whereNull('parent_id')->pluck('name' ,'id');
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . 'edit', $data);
    }

    public function postEdit(CategoriesRequest $request, $id)
    {
        $row = $this->model->findOrFail($id);

        if ($row->update($request->all())) {
            flash(trans('app.update successfully'))->success();
            return redirect( $this->module_url);
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
