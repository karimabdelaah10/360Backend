<?php

namespace App\Modules\Homepage\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use App\Modules\Project\Models\Project;

class HomepageController extends Controller
{

    public $views;

    public function __construct()
    {
        $this->views = 'Homepage::Web.';
    }

    public function getIndex()
    {
        $data['categories'] = Category::HeaderCategories()->get();
        $data['about_us'] = Config::where('page', ConfigsEnum::CONTACT_PAGE)
            ->pluck('value', 'title');
        $data['rows'] = Project::HomePageProjects()
            ->orderBy('id', 'desc')
            ->get();
        if (!count($data['rows'])) {
            return redirect(route('getAboutUS'));
        }
        return view($this->views . 'index', $data);
    }

    public function getUnderConstruction()
    {
        $underConstruction = Config::where('title', ConfigsEnum::UNDER_CONSTRUCTION)->first();
        if ($underConstruction && !$underConstruction->value) {
            return redirect(route('homepage'));
        }
        return view('under_construction');
    }
}
