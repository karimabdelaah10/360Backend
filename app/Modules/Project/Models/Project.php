<?php

namespace App\Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function Sections(){
        return $this->hasMany(Section::class)->orderBy('order');
    }

    public function sectionsWithComponents(){

        return $this->hasManyThrough(Component::class,Section::class);
    }

    public function getData()
    {
        return $this;
    }
}
