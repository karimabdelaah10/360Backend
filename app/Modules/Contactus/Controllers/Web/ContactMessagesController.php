<?php

namespace App\Modules\Contactus\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Contactus\Models\Contactus;
use App\Modules\Contactus\Requests\ContactnUsRequest;
use App\Modules\Contactus\Requests\ContactUsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactMessagesController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct(Contactus $model) {
        $this->views = $this->module = 'Contactus::Web.';
        $this->model = $model;
    }

    public function getIndex() {
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.contact us page');
        return view($this->views . 'index' , $data);
    }

    public function postMessage(ContactUsRequest $request)
    {
        if ($this->model->create($request->all())){
            return back()->with('success' , 'message sent');
        }
    }
}
