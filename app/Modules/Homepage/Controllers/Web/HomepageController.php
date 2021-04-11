<?php

namespace App\Modules\Homepage\Controllers\Web;

use App\Http\Controllers\Controller;

class HomepageController extends Controller {

    public $views;
    public function __construct() {
        $this->views = 'Homepage::Web.';
    }

    public function getIndex() {
        return view($this->views . 'index');
    }

}
