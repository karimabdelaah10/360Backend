<?php

namespace App\Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Component extends Model
{
    use HasFactory;

    public function Fields()
    {
        return $this->hasMany(ComponentField::class)->orderBy('order', 'asc');
    }

    public function ComponentTemplate()
    {
        return $this->belongsTo(ComponentTemplate::class);
    }
    public function Section()
    {
        return $this->belongsTo(Section::class);
    }

    public function getProjectById($id)
    {
        try {
            $project = Project::with('Sections.Components.Fields')
                ->with('Sections.Components.ComponentTemplate.templateFields')->findOrFail($id);
            return $project;
        } catch (ModelNotFoundException $e) {
            flash(trans('Next project with Id' . $id . ' not found '))->error();
            return back();
        }
    }

}
