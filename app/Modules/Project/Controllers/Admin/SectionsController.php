<?php

namespace App\Modules\Project\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Project\Models\Component;
use App\Modules\Project\Models\ComponentField;
use App\Modules\Project\Models\ComponentTemplate;
use App\Modules\Project\Models\Project;
use App\Modules\Project\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Mockery\Exception;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;
use phpDocumentor\Reflection\Types\This;
use function PHPUnit\Framework\isEmpty;

class SectionsController extends Controller
{
    public $model, $module_url;

    public function __construct(Section $model)
    {

        $this->module_url = '/admin/projects/sections/';
        $this->model = $model;
    }


    public function postCreateSection(Request $request, $id)
    {
        $elementOrder = 1;
        $uploadPath = public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'projects' . DIRECTORY_SEPARATOR;
        $imagesName = array();


        $section = new Section();
        $section->project_id = $id;
        $section->order = $this->getCountSectionsOnProject($section->project_id) + 1;
        $section->wrapperType = $request->wrapperType;
        $section->save();

        $component = new Component();
        $component->section_id = $section->id;
        $component->component_template_id = $request->componentTemplateId;
        $componentTemp = ComponentTemplate::findOrFail($request->componentTemplateId);
        $component->name = $componentTemp->name;
        $component->title = $componentTemp->title;
        $component->type = 'element';
        $component->save();

        if (isset($request->files)) {
            foreach ($request->files as $file) {
                $image = $file;
                $temp = time() . $file->getClientOriginalName();
                $imagesName[] = $temp;
                if (!$image->move($uploadPath, $temp)) return;
            }
        }


        foreach ($imagesName as $imageName) {

            $field = new ComponentField();
            $field->value = $imageName;
            $field->type = 'file';
            $field->order = $elementOrder++;
            $field->component_id = $component->id;
            $field->save();
        }

        if (isset($request->text)) {
            foreach ($request->text as $element) {
                $field = new ComponentField();
                $field->value = $element;
                $field->type = 'text';
                $field->order = $elementOrder++;
                $field->component_id = $component->id;
                $field->save();
            }
        }
        if (isset($request->textarea)) {
            foreach ($request->textarea as $element) {
                $field = new ComponentField();
                $field->value = $element;
                $field->type = 'textarea';
                $field->order = $elementOrder++;
                $field->component_id = $component->id;
                $field->save();
            }
        }

        flash(trans('app.created successfully'))->success();
        return back();
//        return redirect($this->module_url . '/edit/' . $id);
    }

    public function getEditSection($id){
        return 'edit section';
    }
    public function postEditSection(Request $request,$id){
        return 'post edit section';
    }



    public function getDeleteSection($id)
    {
        try {
            $row = $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            flash(trans('Section not found '))->error();
            return back();
        }

        $row->delete();
        flash(trans('app.deleted successfully'))->success();
        return back();
    }

    private function getCountSectionsOnProject($projectId)
    {
        $sections = Section::where('project_id', $projectId)->get();
        return (($sections->count()));
    }

    static public  function getSectionWarpperTypes()
    {
        $wrapperTypes=['wrapper-small'=>'small','wrapper'=>'normal','wrapper-full'=>'wide'];
        return $wrapperTypes;
    }
}
