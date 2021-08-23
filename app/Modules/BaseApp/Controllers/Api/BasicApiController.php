<?php


namespace App\Modules\BaseApp\Controllers\Api;


use App\Modules\Notification\Notification;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Resources\ProductsListResource;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\Resources\UsersListResource;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Auth;

class BasicApiController
{

    public function init(){
        return [
            'trans'=>[
                'search_input_placeholder'=>trans('app.search'),
                'products'=>trans('app.products'),
                'users'=>trans('app.users'),
            ]
        ];
    }
    public function search($search_key)
    {
        $data=[];
        try {
            $products=[];
            $users=[];
            $user = User::findOrFail(request()->user_id);
            Auth::login($user);

            if ($user->getRawOriginal('type') == UserEnum::SUPER_ADMIN){
                $users = User::where('name' , 'like' ,'%'.$search_key.'%')
                    ->orWhere('mobile_number' ,'like' ,'%'.$search_key.'%')
                    ->orWhere('email' ,'like' ,'%'.$search_key.'%')
                    ->orWhere('address' ,'like' ,'%'.$search_key.'%')
                    ->Customer()
                    ->get();
            }
            $products = Product::where('title' , 'like' ,'%'.$search_key.'%')
                ->orWhere('description' ,'like' ,'%'.$search_key.'%')
                ->orWhere('price' ,'like' ,'%'.$search_key.'%')
                ->orWhere('commission' ,'like' ,'%'.$search_key.'%')
                ->get();
            $data = [
                'products' => new ProductsListResource($products),
                'users'    =>new UsersListResource($users),
            ];
            return custome_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('app_debug')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data, $title.' '. $message, []);
        }
    }
}
