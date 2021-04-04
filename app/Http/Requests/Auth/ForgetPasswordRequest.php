<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
class ForgetPasswordRequest extends FormRequest
{

    public function rules()
    {
        return [
            'mobile_number' => 'required|exists:users,mobile_number',
        ];
    }
}
