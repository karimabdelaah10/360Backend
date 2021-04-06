<?php

namespace App\Modules\Homepage\Controllers\Web;

use App\Http\Controllers\Controller;

class HomepageController extends Controller {

    public $model;
    public $views;
    public $module;

    public function __construct() {
        $this->views = 'Dashboard';
//        $this->title = trans('app.Slider');
//        $this->model = $model;
//        $this->rules = $model->rules;
    }

    public function getIndex() {
        return view($this->views . '::index');
    }

}
