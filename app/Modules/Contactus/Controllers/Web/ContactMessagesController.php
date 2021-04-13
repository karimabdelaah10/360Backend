<?php

namespace App\Modules\Contactus\Controllers\Web;

use App\Http\Controllers\Controller;
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
        $data['row']['contact_us_page_title_first_word'] = '';
        $data['row']['contact_us_page_title_last_chunk'] = '';
        if (!empty($data['rows']['contact_us_page_title'])){
            $string =$data['rows']['contact_us_page_title'];
            $string_as_list = explode(' ', $string);
            $first_word = array_shift($string_as_list);
            $last_chunk = implode(' ', $string_as_list);
            $data['row']['contact_us_page_title_first_word'] = $first_word;
            $data['row']['contact_us_page_title_last_chunk'] = $last_chunk;
        }
          if (!empty($data['rows']['address'])){
              $string = $data['rows']['address'];
              $adress = explode(',', $string, );
              $data['row']['address'] = $adress;
          }


        return view($this->views . 'index' , $data);
    }

    public function postMessage(ContactUsRequest $request)
    {
        if ($this->model->create($request->all())){
            return back()->with('success' , 'message sent');
        }
    }
}
