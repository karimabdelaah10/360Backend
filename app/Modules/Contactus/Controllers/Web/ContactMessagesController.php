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
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['rows'] = Config::where('page' , ConfigsEnum::CONTACT_PAGE)
        ->pluck('value', 'title');
        $data['page_title'] = trans('app.contact us page');
        $page_title = [];
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();

          if (!empty($data['rows']['address'])){
              $string = $data['rows']['address'];
              $adress = explode(',', $string, );
              $data['row']['address'] = $adress;
          }

        $data['categories']=Category::HeaderCategories()->get();
        $data['about_us'] = Config::where('page' , ConfigsEnum::CONTACT_PAGE)
            ->pluck('value', 'title');
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
