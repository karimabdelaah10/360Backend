<?php


namespace App\Modules\Config\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Config\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Config $model) {
        $this->module = 'configs';
        $this->module_url = '/configs';
        $this->views = 'Config';
        $this->title = trans('app.configs');
        $this->model = $model;
    }

    public function getEdit() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [];
        $data['rows'] = $this->model->all();
        $data['row'] = $this->model;
        return view($this->views . '::edit', $data);
    }

    public function postEdit(Request $request) {
        Config::where('type' , 'switch')->update(['value' =>0]);
        if (!empty($request)){
            foreach ($request->all() as $key =>$value){
                $row = $this->model->find($key);
                if ($row){
                    if ($row->type == 'switch'){
                        $row->update(['value' => 1]);
                    }else{
                        $row->update(['value' => $value]);
                    }
                }
            }
        }
        flash(trans('app.update successfully'))->success();
        return back();
    }


}
