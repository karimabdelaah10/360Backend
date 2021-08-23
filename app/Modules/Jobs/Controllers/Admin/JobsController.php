<?php

namespace App\Modules\Jobs\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Jobs\Models\Job;
use App\Modules\Jobs\Requests\JobsRequest;

class JobsController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct(Job $model) {
        $this->views = $this->module = 'Jobs::Admin.';
        $this->title = trans('app.Jobs');
        $this->model = $model;
        $this->module_url = '/admin/jobs';
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('jobs.page description');
        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->paginate(request('per_page'));

        return view($this->views . 'index' , $data);
    }

    public function getCreate() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . 'create' , $data);
    }

    public function postCreate(JobsRequest $request) {
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
