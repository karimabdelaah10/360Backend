<?php

namespace App\Modules\Users\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\MoneyProcess\Models\Paymentmethod;
use App\Modules\Products\Models\Order;
use App\Modules\Users\Requests\ChangeProfilePasswordRequest;
use App\Modules\Users\Requests\UpdateProfileRequest;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {

    public $model;
    public $views;
    public $module;
    public $module_url;
    private $title;

    public function __construct(User $model) {
        $this->module = 'Profile';
        $this->module_url = '/profile';
        $this->views = 'Users::profile';
        $this->title = 'الصفحه الشخصيه';
        $this->model = $model;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['views'] = $this->views.'::profile';
        $data['page_title'] = $this->title;
        $data['row'] = $this->model->find(Auth::user()->id);
        $data['payment_method'] = Paymentmethod::where('user_id' , \auth()->id())->where('default' , 1)->first();
//        return  $data['row']->moneyRequests;
        return view($this->views . '.index', $data);
    }


    public function getEdit() {
        $data['module'] = $this->module;
        $data['views'] = $this->views.'::profile';
        $data['page_title'] = trans('profile.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->find(Auth::user()->id);
        return view($this->views . '.edit', $data);
    }

    public function postEdit(UpdateProfileRequest $request) {
        $row = $this->model->findOrFail(Auth::user()->id);
        $row->update($request->except('_token'));
        return redirect()->back()->with('success', trans('profile.update profile success message'));
    }

    public function changePassword(ChangeProfilePasswordRequest $request)
    {
    $this->model->findOrFail(Auth::user()->id)->update([
        'password'=>$request->password
    ]);
        return redirect()->back()->with('success', trans('profile.update password success message'));
    }

    public function getMoneyRequests()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['page_title'] = trans('user.all money requests');
        $data['page_description'] = trans('user.all money requests');
        $data['rows'] =Moneyrequest::where('user_id' , Auth::user()->id)->latest()->paginate(request('per_page'));
        return view($this->views . '.money-requests', $data);
    }
    public function getOrders()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['page_title'] = trans('user.all orders');
        $data['page_description'] = trans('user.all orders');
        $data['rows'] =Order::where('user_id' , Auth::user()->id)->latest()->paginate(request('per_page'));
        return view($this->views . '.all_orders', $data);

    }

    public function getOrderDetails($id)
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = Order::findOrFail($id);
        $data['page_title'] = trans('user.list one order');
        $data['page_description'] = trans('user.list one order');
        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . '.one_order', $data);

    }
}
