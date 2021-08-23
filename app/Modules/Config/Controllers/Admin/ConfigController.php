<?php


namespace App\Modules\Config\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{


    public $model;
    public $views;
    public $module, $module_url, $title;

    public function __construct(Config $model)
    {
        $this->views = $this->module = 'Config::Admin.';
        $this->title = trans('app.Configs');
        $this->model = $model;
        $this->module_url = '/admin/configs';

    }

    public function getEdit()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [];
        $data['rows'] = $this->model
    ->where('page' , '!=',ConfigsEnum::ABOUT_PAGE)
    ->orWhere('title' , ConfigsEnum::ABOUT_US_COLOR_SCHEMA)
    ->get();
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
