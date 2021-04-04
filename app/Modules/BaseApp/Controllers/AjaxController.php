<?php

namespace App\Modules\BaseApp\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Projects\Models\Project;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
    }

    public function filterProjectsByAreaId()
    {
        return Project::active()->where('area_id' , \request()->area_id)->get()->pluck('title',"id");
    }
}

