<?php

namespace App\Modules\Homepage\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomepageController extends Controller {

    public $model;
    public $views;
    public $module;

    public function __construct() {
        $this->views = 'Homepage::Admin.';
    }

    public function getIndex() {
        return view($this->views . 'index');
    }

}
