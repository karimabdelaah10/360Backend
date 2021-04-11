<?php

namespace App\Modules\Contactus\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Contactus\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactMessagesController extends Controller {

    public $model,$views,$module,$module_url,$title;

    public function __construct(Contactus $model) {
        $this->views = $this->module = 'Contactus::Web.';
        $this->model = $model;
    }

    public function getIndex() {
//        $data['module'] = $this->module;
//        $data['module_url'] = $this->module_url;
//        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.contact us page');
//        $data['page_description'] = trans('contactus.page description');
//        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->paginate(request('per_page'));

        return view($this->views . 'index' , $data);
    }

    public function postMessage(Request $request)
    {
        return $request->all();
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model->findOrFail($id);
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . 'view', $data);

    }

    public function getDelete($id)
    {
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }

    public function clearAll()
    {
        DB::table('contactuses')->truncate();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }

}
