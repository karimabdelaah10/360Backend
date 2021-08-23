<?php

namespace App\Modules\Jobs\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Jobs\Models\Job;
use App\Modules\Jobs\Models\Jobcv;
use App\Modules\Jobs\Requests\JobsWebRequest;
use App\Modules\Config\Models\Config;
use App\Modules\Config\Enums\ConfigsEnum;

class JobsController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct(Job $model) {
        $this->views = $this->module = 'Jobs::Web.';
        $this->title = trans('app.Careers');
        $this->model = $model;
        $this->module_url = '/jobs';
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=Config::where('page' , ConfigsEnum::JOBS_PAGE)
            ->pluck('value', 'title');;
        $data['row']->is_active = 1;
        $data['page_title'] = $this->title;
        $data['page_description'] = trans('jobs.page description');
        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->paginate(request('per_page'));
                $data['categories']=Category::HeaderCategories()->get();
        $data['about_us'] = Config::where('page' , ConfigsEnum::CONTACT_PAGE)
            ->pluck('value', 'title');
        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['row'][ConfigsEnum::JOBS_COLOR_SCHEMA]]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['row'][ConfigsEnum::JOBS_COLOR_SCHEMA]]['menu-layout'];

        return view($this->views . 'index' , $data);
    }

    public function postMessage(JobsWebRequest $request) {
        if (Jobcv::create($request->all())){
            return back()->with('success' , 'Your cv has been submitted');

        }
    }

}
