<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Cars\Car;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use App\Modules\Products\Models\Product;
use App\Modules\Users\Adminproduct;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\Models\Customer;
use App\Modules\Users\Requests\CreateUserRequest;
use App\Modules\Users\Requests\UpdateUserRequest;
use App\Modules\Users\User;
use App\Modules\Users\UserEnums;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public $model;
    public $module,$module_url, $views ,$title;

    public function __construct(User $model)
    {
        $this->module = 'admins';
        $this->module_url = '/admins';
        $this->views = 'Users::admins';
        $this->title = trans('app.admins');
        $this->model = $model;
    }

    public function getIndex()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . ' ' . $this->title;
        $data['page_description'] = trans('admin.page description');
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        $data['rows'] = $this->model->getData()->Admin()->latest()->paginate(request('per_page'));

        return view($this->views . '.index', $data);
    }
    public function getCreate()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        return view($this->views . '.create', $data);
    }
    public function postCreate(CreateUserRequest $request)
    {
        $request['type'] = UserEnum::ADMIN;
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        if ($row = $this->model->create($request->all()))
        {
            flash()->success(trans('app.created successfully'));
            return redirect($this->module_url);
        }
        flash()->error(trans('app.failed to save'));
        return redirect($this->module_url);
    }
    public function getEdit($id)
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->Admin()->findOrFail($id);
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        return view($this->views . '.edit', $data);
    }
    public function postEdit(UpdateUserRequest $request, $id)
    {
        $row = $this->model->Admin()->findOrFail($id);
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        if ($row->update($request->all())) {
            flash(trans('app.update successfully'))->success();
            return redirect($this->module_url);
        }
        flash()->error(trans('app.failed to save'));
        return redirect($this->module_url);
    }
    public function getView($id)
    {
        $data['views'] = $this->views;
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->Admin()->findOrFail($id);
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        return view($this->views . '.view', $data);
    }
    public function getDelete($id)
    {
        $row = $this->model->Admin()->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }


    public function getAddProduct($id)
    {
        $ids = Adminproduct::where('user_id' , $id)->pluck('product_id');
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.add') . " ". trans('app.products')." " . $this->title;
        $data['breadcrumb'] = [
            $this->title => $this->module_url,
            trans('app.view') . " " . $this->title => $this->module_url .'/view/'.$id
            ];
        $data['row'] = $this->model;
        $data['row']->admin = User::findOrFail($id);
        $data['row']->products = Product::whereNotIn('id' , $ids)
            ->orderBy('id' ,'desc')->pluck('title' ,'id');
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();

        return view($this->views . '.add-product', $data);
    }
    public function postAddProduct(Request $request , $id)
    {
        if(Adminproduct::create($request->all())){
            flash()->success(trans('app.created successfully'));
            return back();
        }
        flash()->error(trans('app.failed to save'));
        return back();
    }

    public function deleteProduct($id)
    {
        $row =Adminproduct::findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }
}
