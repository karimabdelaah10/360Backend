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
            ->orderBy('homepage_order', 'asc')
            ->get();
        if (!count($data['rows'])) {
            return redirect(route('getAboutUS'));
        }
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        $data['color'] = Config::where('page', ConfigsEnum::HOME_PAGE)->pluck('value', 'title');;
        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['color'][ConfigsEnum::HOME_PAGE_COLOR_SCHEMA]]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['color'][ConfigsEnum::HOME_PAGE_COLOR_SCHEMA]]['menu-layout'];

        return view($this->views . 'index', $data);
    }

    public function getUnderConstruction()
    {
        $underConstruction = Config::where('title', ConfigsEnum::UNDER_CONSTRUCTION)->first();
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        if ($underConstruction && !$underConstruction->value) {
            return redirect(route('homepage'));
        }
        return view('under_construction' , $data);
    }
}
