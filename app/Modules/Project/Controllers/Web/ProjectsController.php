<?php

namespace App\Modules\Project\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use App\Modules\Project\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectsController extends Controller
{
    public $model, $views, $module, $module_url, $title;

    public const ColorSechma = [
        'dark' => ['site-layout' => 'dark', 'menu-layout' => 'light'],
        'light' => ['site-layout' => 'light', 'menu-layout' => 'dark']
    ];

    public function __construct(Project $model)
    {
        $this->views = $this->module = 'Project::Web.';
        $this->title = trans('Project.Project ');
        $this->module_url = '/project/';
        $this->model = $model;
    }

    public function index()
    {
         $projects = Project::with('Sections.Components.Fields')
            ->with('Sections.Components.ComponentTemplate.templateFields')->get();
                $data['categories']=Category::HeaderCategories()->get();
        $data['about_us'] = Config::where('page' , ConfigsEnum::CONTACT_PAGE)
            ->pluck('value', 'title');
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        return view($this->views . 'index' , $data);
    }

    public function getSubCategoriesByCategoryId(Category $category)
    {
        $data['rows'] = Category::ChildCategories($category->id)->whereHas('Projects')->get();
        $data['categories']=Category::HeaderCategories()->get();
        $data['page_title']=$category->name. ' Sub Categories';
        $data['parent'] = $category;
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        return view($this->views . 'sub_categories' , $data);
    }
    public function getCategoryProjects($id = null)
    {
        if ($id){
            $data['category'] = Category::findOrFail($id);
            $category_name = $data['category']->name ;
            $data['rows'] =$this->model->where('category_id' , $id)->orderBy('id' , 'desc')->get();
        }else{
            $category_name = 'All';
            $data['rows'] =$this->model->orderBy('category_order' , 'desc')->get();
        }
        $data['categories']=Category::HeaderCategories()->get();
        $data['about_us'] = Config::where('page' , ConfigsEnum::CONTACT_PAGE)
            ->pluck('value', 'title');
        $data['category_config'] = Config::where('page' , ConfigsEnum::PROJECT_CATEGORY_PAGE)
            ->pluck('value', 'title');
        $data['page_title']=$category_name. ' Projects';
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['category_config'][ConfigsEnum::PROJECT_CATEGORY_COLOR_SCHEMA]]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['category_config'][ConfigsEnum::PROJECT_CATEGORY_COLOR_SCHEMA]]['menu-layout'];

        return view($this->views . 'category-projects' , $data);
    }

    public function getProject($id)
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        try {
            $data['row'] = Project::with('Sections.Components.Fields')
                ->with('Sections.Components.ComponentTemplate.templateFields')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            flash(trans('project with Id' . $id . ' not found '))->error();
            return back();
        }

        $data['row']->is_active = 1;
        $data['page_title'] = $this->title . $data['row']->name;
        $data['page_description'] = trans('projects.page description');
        $data['SchemaType'] = ProjectsController::ColorSechma;
        $data['categories']=Category::HeaderCategories()->get();
        $data['about_us'] = Config::where('page' , ConfigsEnum::CONTACT_PAGE)
            ->pluck('value', 'title');

        $data['site_layout'] = ConfigsEnum::getColorSchema()[$data['row']->colorSchema]['site-layout'];
        $data['menu_layout'] = ConfigsEnum::getColorSchema()[$data['row']->colorSchema]['menu-layout'];
        $data['allow_inspect'] =Config::where('title',ConfigsEnum::ALLOW_INSPECT)->first();
        return view($this->views . 'project', $data);
    }

}
