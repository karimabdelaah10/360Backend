<?php

namespace App\Modules\Homepage\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;

class HomepageController extends Controller {

    public $model;
    public $views;
    public $module;

    public function __construct() {
        $this->views = 'Homepage::Admin.';
    }

    public function getIndex() {
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        return view($this->views . 'index' , $data);
    }

}
