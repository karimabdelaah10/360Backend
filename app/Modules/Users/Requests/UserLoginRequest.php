<?php

namespace App\Modules\Users\Requests;

use App\Modules\BaseApp\Requests\BaseAppRequest;
use App\Modules\Users\UserEnums;
use Illuminate\Validation\Rule;

class UserLoginRequest extends BaseAppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}
