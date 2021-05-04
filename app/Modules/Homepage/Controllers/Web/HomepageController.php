<?php

namespace App\Modules\Homepage\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Project\Models\Project;

class HomepageController extends Controller {

    public $views;
    public function __construct() {
        $this->views = 'Homepage::Web.';
    }

    public function getIndex() {
        $data['categories']=Category::HeaderCategories()->get();
        $data['rows'] = Project::HomePageProjects()
            ->orderBy('id' , 'desc')
            ->get();
        return view($this->views . 'index' , $data);
    }

}
