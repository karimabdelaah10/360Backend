<?php

namespace App\Modules\Jobs\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Contactus\Models\Contactus;
use App\Modules\Jobs\Models\Job;
use App\Modules\Jobs\Models\Jobcv;
use App\Modules\Jobs\Requests\JobsRequest;
use Illuminate\Support\Facades\DB;

class JobCvsController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct(Jobcv $model) {
        $this->views = $this->module = 'Jobs::Admin.cv.';
        $this->title = trans('app.Cvs');
        $this->model = $model;
        $this->module_url = '/admin/cvs';
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('jobs.cvs page description');
        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->paginate(request('per_page'));

        return view($this->views . 'index' , $data);
    }


    public function getDelete($id)
    {
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }

}
