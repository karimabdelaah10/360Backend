<?php

namespace App\Modules\Project\Models;

use App\Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable=['name','description','title','colorSchema','category_id'];

    public function Sections(){
        return $this->hasMany(Section::class)->orderBy('order');
    }
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function sectionsWithComponents(){

        return $this->hasManyThrough(Component::class,Section::class);
    }


    public function getData()
    {
        return $this;
    }
}
