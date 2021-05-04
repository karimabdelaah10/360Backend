<?php

namespace App\Modules\Project\Models;

use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasAttach;

    protected static $attachFields = [
        'image' => [
            'sizes' => ['small' => 'crop,200x200', 'large' => 'resize,800x800'],
            'path' => 'storage/uploads'
        ],
    ];

    protected $fillable=['name','description','image','colorSchema','category_id'];

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
    public function scopeHomePageProjects($query)
    {
        return $this;
    }
}
