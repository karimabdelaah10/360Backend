<?php

namespace App\Modules\BaseApp\Requests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Tymon\JWTAuth\Facades\JWTAuth;

class BaseApiTokenDataRequest extends BaseApiRequest
{

    public function prepareForValidation()
    {
//        $token = JWTAuth::getToken();
//        $user = null;
//        if (!$token) {
//            throw new HttpResponseException(response()->json(
//            [
//                "errors" => [[
//                    'status' => 403,
//                    'title' => 'Unauthorized action',
//                    'detail' => 'Unauthorized action. Please Use Authorized Token'
//                ]]
//            ], 403));
//        }
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            throw new HttpResponseException(response()->json( [
                "errors" => [[
                    'status' => 401,
                    'title' => 'Token Expired',
                    'detail' => 'Unauthorized action. Please Use Token Valid'
                ]]
            ], 401));

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            throw new HttpResponseException(response()->json(
                [
                    "errors" => [[
                        'status' => 401,
                        'title' => 'Token Invalid',
                        'detail' => 'Unauthorized action. Please Use Valid Token'
                    ]]
                ], 401));

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            throw new HttpResponseException(response()->json(
                [
                    "errors" => [[
                        'status' => 403,
                        'title' => 'Unauthorized action',
                        'detail' => 'Unauthorized action. Please Use Authorized Token'
                    ]]
                ], 403));
        }
    }

    public function validationData()
    {
        $data = $this->json()->all();
        if (!isset($data['data']['attributes'])) {
            throw new HttpResponseException(response()->json([
                "errors" => [ [
                    'status' => 422,
                    'title' => 'attributes not found',
                    'detail' => 'attributes not found'
                ]]
            ], 422));

        }
        return $data['data']['attributes'];
    }
    public function addError($key  , $message)
    {

        $validator = $this->getValidatorInstance();

        $validator->after(function ($validator) use ($key, $message) {
            $validator->errors()->add($key, $message);
        });
    }
}
