<?php

namespace App\Modules\BaseApp\Requests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Tymon\JWTAuth\Facades\JWTAuth;

class BaseApiTokenRequest extends BaseApiRequest
{
    public function prepareForValidation()
    {
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
//        $token = JWTAuth::getToken();
//        $user = JWTAuth::toUser($token);
//        if (!$token) {
//            throw new HttpResponseException(response()->json([
//                'status' => 403,
//                'title' => 'Unauthorized action',
//                'detail' => 'Unauthorized action. Please Use Authorized Token'
//            ], 403));
//        }
    }
}
