<?php

namespace App\Modules\Jobs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsWebRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'subject' => 'required',
            'cv_url' => 'required|url',
        ];
    }
}
