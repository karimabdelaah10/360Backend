<?php

namespace App\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = auth()->user()->id;
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'required|unique:users,mobile_number,'.$id,
            'profile_picture'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
