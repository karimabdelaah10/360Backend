<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\Products\Models\Order;
use App\Modules\Slider\Models\Slider;
use App\Modules\Users\User;

class DashboardController extends Controller {

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
