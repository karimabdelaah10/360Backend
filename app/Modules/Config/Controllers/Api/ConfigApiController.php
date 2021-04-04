<?php


namespace App\Modules\Config\Controllers\Api;


use App\Modules\Config\Models\Config;

class ConfigApiController
{

    public function getConfigByTitle()
    {
        $data=[];
        try {
            $data  =Config::pluck('value' ,'title');
            return custome_response(200 ,$data , '' ,[]);
        }
        catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('app_debug')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data,  $title. '   '.$message, []);
        }
    }
}
