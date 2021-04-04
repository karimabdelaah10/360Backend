<?php

namespace App\Modules\Users\Requests;

use App\Modules\Users\Enums\CustomersEnum;
use App\Rules\Mobile;
use Carbon\Carbon;
use App\Modules\Users\User;
use Illuminate\Validation\Rule;
use App\Modules\Users\UserEnums;
use Illuminate\Support\Facades\Auth;
use App\Modules\BaseApp\Requests\BaseAppRequest;

class CreateUserRequest extends BaseAppRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile_number' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'profile_picture'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }


}
