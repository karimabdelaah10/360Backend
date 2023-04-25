<?php

namespace App\Modules\Contactus\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use App\Modules\Contactus\Models\Contactus;
use App\Modules\Contactus\Requests\ContactUsRequest;


class ContactMessagesController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct(Contactus $model) {
        $this->views = $this->module = 'Contactus::Web.';
        $this->model = $model;
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
        $data['rows'] = $configs;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.contact us page');
          if (!empty($data['rows']['address'])){
              $string = $data['rows']['address'];
              $adress = explode(',', $string, );
              $data['row']['address'] = $adress;
          }
        $data['categories']=Category::HeaderCategories()->get();
        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['about_us'][ConfigsEnum::CONTACT_US_COLOR_SCHEMA]]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['about_us'][ConfigsEnum::CONTACT_US_COLOR_SCHEMA]]['menu-layout'];

        return view($this->views . 'index' , $data);
    }

    public function postMessage(ContactUsRequest $request)
    {
        if ($this->model->create($request->all())){
            return back()->with('success' , 'message sent');
        }
    }
}
