<?php


namespace App\Modules\Users\Requests;
use App\Modules\BaseApp\Requests\BaseAppRequest;
use App\Modules\Users\Enums\CustomersEnum;
use App\Rules\Mobile;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends BaseAppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'mobile_number' => 'required|string|max:255|unique:users,mobile_number,'.$id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
