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
        $data['rows'] = Config::where('page' , ConfigsEnum::ABOUT_PAGE)
            ->pluck('value', 'title');
        $data['about_us'] = Config::where('page' , ConfigsEnum::CONTACT_PAGE)
            ->pluck('value', 'title');
        $data['page_title'] = trans('app.about us page');
        $data['services'] = Service::all();
        $data['categories']=Category::HeaderCategories()->get();
        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['rows'][ConfigsEnum::ABOUT_US_COLOR_SCHEMA]]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['rows'][ConfigsEnum::ABOUT_US_COLOR_SCHEMA]]['menu-layout'];

        return view($this->views . 'index',$data );
    }
}
