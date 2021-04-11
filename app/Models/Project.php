<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function sections(){
        return $this->hasMany(Section::class)->orderBy('order');
    }
    public function sectionsWithComponents(){

        return $this->hasManyThrough(Component::class,Section::class);
    }
}
