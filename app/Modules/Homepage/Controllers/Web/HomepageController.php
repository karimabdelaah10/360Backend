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
        $configs = Config::query()->where('page', ConfigsEnum::CONTACT_PAGE)
            ->orWhere('title', ConfigsEnum::ALLOW_INSPECT)
            ->orWhere('title', ConfigsEnum::HOME_PAGE_COLOR_SCHEMA)
            ->orWhere('title', ConfigsEnum::KEYWORDS)
            ->orWhere('title', ConfigsEnum::DESCRIPTION)
            ->pluck('value', 'title');

        $data['allow_inspect'] = $configs[ConfigsEnum::ALLOW_INSPECT];
        unset($configs[ConfigsEnum::ALLOW_INSPECT]);
        $data['color'] = $configs[ConfigsEnum::HOME_PAGE_COLOR_SCHEMA];
        unset($configs[ConfigsEnum::HOME_PAGE_COLOR_SCHEMA]);
        $data['keywords'] = $configs[ConfigsEnum::KEYWORDS];
        unset($configs[ConfigsEnum::KEYWORDS]);
         $data['description'] = $configs[ConfigsEnum::DESCRIPTION];
        unset($configs[ConfigsEnum::DESCRIPTION]);

        $data['about_us'] = $configs;
        $data['categories'] = Category::HeaderCategories()->get();
        $data['rows'] = Project::HomePageProjects()
            ->orderBy('homepage_order', 'asc')
            ->get();
        if (!count($data['rows'])) {
            return redirect(route('getAboutUS'));
        }
        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['color']]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['color']]['menu-layout'];
        return view($this->views . 'index', $data);
    }

    public function getUnderConstruction()
    {
        $underConstruction = Config::where('title', ConfigsEnum::UNDER_CONSTRUCTION)->first();
        $data['allow_inspect'] = Config::where('title', ConfigsEnum::ALLOW_INSPECT)->first();
        if ($underConstruction && !$underConstruction->value) {
            return redirect(route('homepage'));
        }
        return view('under_construction', $data);
    }
}
