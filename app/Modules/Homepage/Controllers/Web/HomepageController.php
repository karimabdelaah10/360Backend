<?php

namespace App\Modules\Homepage\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;

class HomepageController extends Controller {

    public $views;
    public function __construct() {
        $this->views = 'Homepage::Web.';
    }

    public function getIndex() {
        $data['categories']=Category::all();
        return view($this->views . 'index' , $data);
    }

}
