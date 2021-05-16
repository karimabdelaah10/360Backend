<?php

namespace App\Modules\Project\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Project\Models\Component;
use App\Modules\Project\Models\ComponentField;
use App\Modules\Project\Models\ComponentTemplate;
use App\Modules\Project\Models\Project;
use App\Modules\Project\Models\Section;
use App\Modules\Project\Models\SliderImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Mockery\Exception;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;
use phpDocumentor\Reflection\Types\This;
use function PHPUnit\Framework\isEmpty;

class SectionsController extends Controller
{
    public $model, $module_url, $views, $module, $title;

    public function __construct(Section $model)
    {
        $this->views = 'Project::Admin.';
        $this->module_url = '/admin/projects';
        $this->model = $model;
        $this->title = trans('app.Projects');
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


        if (isset($request->nextProject)) {
            $field = new ComponentField();
            $field->value = $request->nextProject;
            $field->type = 'select';
            $field->order = $elementOrder++;
            $field->component_id = $component->id;
            $field->save();
        }

        if (null != $request->file('slider_images')) {
            foreach ($request->file('slider_images') as $file) {
                $image = $file;
                $temp = time() . $file->getClientOriginalName();
                $imagesName[] = $temp;
                if (!$image->move($uploadPath, $temp)) return;
            }
        } elseif (isset($request->files)) {
            foreach ($request->files as $file) {
                $image = $file;
                $temp = time() . $file->getClientOriginalName();
                $imagesName[] = $temp;
                if (!$image->move($uploadPath, $temp)) return;
            }
        }

        if (null == $request->file('slider_images')) {
            foreach ($imagesName as $imageName) {
                $field = new ComponentField();
                $field->value = $imageName;
                $field->type = 'file';
                $field->order = $elementOrder++;
                $field->component_id = $component->id;
                $field->save();
            }
        } elseif (null != $request->file('slider_images')) {
            foreach ($imagesName as $imageName) {
                $field = new  SliderImages();
                $field->value = $imageName;
                $field->component_id = $component->id;
                $field->save();
            }
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

    public function getEditSection($id)
    {

        $data['module_url'] = $this->module_url; // for action field
        $data['section_module_url'] = $this->module_url . '/sections'; // for action field
        $data['views'] = $this->views;
        $data['row'] = $this->model
            ->with('Project')
            ->with('Components.Fields')
            ->with('Components.ComponentTemplate.templateFields')
            ->findOrFail($id);
        $data['row']->is_active = 1;
        $data['all_projects'] = Project::all()->pluck('name', 'id');
        $data['wrappers_type'] = SectionsController::getSectionWrapperTypes();
        $data['componentsTemplate'] = ComponentTemplate::with('templateFields')->get();
        $data['categories'] = Category::all()->pluck('name', 'id');
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [
            $this->title => $this->module_url,
            trans('app.view') . " " . $this->title => $this->module_url . '/view/' . $id
        ];
//return $data['row'];
        return view($this->views . 'editSection', $data);
    }

    public function postEditSection(Request $request, $id)
    {

        $uploadPath = public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'projects' . DIRECTORY_SEPARATOR;
        $section = Section::findOrFail($request->sectionId);
        $section->wrapperType = $request->wrapperType;
       if ($section->order != $request->order) $this->updateSectionOrder($section, $request->order);
        $section->order=$request->order;
        $section->save();

        if (isset($request->nextProject)) {
            $component=Component::findOrFail($id);
            $field = $component->Fields[0];
            $field->value = $request->nextProject;
            $field->save();
        }


        if (null != ($request->file('image'))) {
            foreach ($request->file('image') as $fieldId => $file) {
                $image = $file;
                $imageName = time() . $file->getClientOriginalName();
                if (!$image->move($uploadPath, $imageName)) return;
                $field = ComponentField::findOrFail($fieldId);
                if (is_file($uploadPath . $field->value)) {
                    unlink($uploadPath . $field->value);
                }
                $field->value = $imageName;
                $field->save();
            }
        }

        if (isset($request->text)) {
            foreach ($request->text as $fieldId => $element) {
                $field = ComponentField::findOrFail($fieldId);
                $field->value = $element;
                $field->save();
            }
        }

        if (isset($request->textarea)) {
            foreach ($request->textarea as $fieldId => $element) {
                $field = ComponentField::findOrFail($fieldId);
                $field->value = $element;
                $field->save();
            }
        }

        if ($request->file('slider_images') != null) {
            $component =$section->Components[0];
            $component->SliderImages();
            foreach ($component->SliderImages as $image) {
                $image->delete();
                unlink($uploadPath . $image->value);
            }
            foreach ($request->file('slider_images') as $file) {

                $imageName = time() . $file->getClientOriginalName();
                if (!$file->move($uploadPath, $imageName)) return;
                $img = new SliderImages();
                $img->value = $imageName;
                $img->component_id = $component->id;
                $img->save();
            }


        }
        flash(trans('app.updated successfully'))->success();
        return back();


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

    static public function getSectionWrapperTypes()
    {
        return ['wrapper-small' => 'small', 'wrapper' => 'normal', 'wrapper-full' => 'wide'];

    }

    public function updateSectionOrder($section, $order)
    {
        $current_index = $section->order;
        $new_index = $order;
        $skip_id = $section->id;
        if ($current_index != $new_index) {
            if ($current_index > $new_index) {
                $section->where('order', '>=', $new_index)
                    ->where('order', '<', $current_index)
                    ->where('id', '!=', $skip_id) // to skip this element
                    ->increment('order');
            } elseif ($current_index < $new_index) {
                $section->where('order', '<=', $new_index)
                    ->where('order', '>', $current_index)
                    ->where('id', '!=', $skip_id)
                    ->decrement('order');
            }
        }

    }
}
