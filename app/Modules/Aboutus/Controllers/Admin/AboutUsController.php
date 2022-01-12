<?php

namespace App\Modules\Aboutus\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct(Config $model)
    {
        $this->views = $this->module = 'Aboutus::Admin.';
        $this->title = trans('app.about us page');
        $this->model = $model;
        $this->module_url = '/admin/aboutus';

    }

    public function getEdit()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [];
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        $data['rows'] = $this->model->where('page' , ConfigsEnum::ABOUT_PAGE)->get();
        $data['row'] = $this->model;

        return view($this->views . 'edit', $data);
    }

    public function postEdit(Request $request)
    {
//        Config::where('type', 'switch')->update(['value' => 0]);
        if (!empty($request)) {
            foreach ($request->all() as $key => $value) {
                $row = $this->model->find($key);
                if ($row) {
                    if ($row->type == 'switch') {
                        $row->update(['value' => 1]);
                    } else {
                        $row->update(['value' => $value]);
                    }
                }
            }
        }
        flash(trans('app.update successfully'))->success();
        return back();
    }

}
