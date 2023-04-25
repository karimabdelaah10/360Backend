<?php

namespace App\Modules\Aboutus\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Aboutus\Models\Service;
use App\Modules\Category\Models\Category;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use App\Modules\Contactus\Models\Contactus;
use App\Modules\Contactus\Requests\ContactUsRequest;


class AboutUsController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct() {
        $this->views = $this->module = 'Aboutus::Web.';
    }

    public function getIndex() {
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
        $data['rows'] = Config::where('page' , ConfigsEnum::ABOUT_PAGE)
            ->pluck('value', 'title');
        $data['page_title'] = trans('app.about us page');
        $data['services'] = Service::all();
        $data['categories']=Category::HeaderCategories()->get();
        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['rows'][ConfigsEnum::ABOUT_US_COLOR_SCHEMA]]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['rows'][ConfigsEnum::ABOUT_US_COLOR_SCHEMA]]['menu-layout'];

        return view($this->views . 'index',$data );
    }
}
