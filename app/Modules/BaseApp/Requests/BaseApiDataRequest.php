<?php

namespace App\Modules\BaseApp\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;

class BaseApiDataRequest extends BaseApiRequest
{
    public function validationData()
    {
        $data = $this->json()->all();
        if (!isset($data['data']['attributes'])) {
            throw new HttpResponseException(response()->json([
                "errors" => [ [
                    'status' => 422,
                    'title' => 'attributes not found',
                    'detail' => 'attributes not found'
                ] ]
            ], 422));
        }
        return $data['data']['attributes'];
    }

    protected function addError($key  , $message)
    {

        $validator = $this->getValidatorInstance();

        $validator->after(function ($validator) use ($key, $message) {
            $validator->errors()->add($key, $message);
        });
    }
}
