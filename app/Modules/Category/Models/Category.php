<?php

namespace App\Modules\Category\Models;

use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\Project\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use  HasAttach ;

    protected $fillable = ['name', 'description', 'image'];

    protected static $attachFields = [
        'image' => [
            'sizes' => ['small' => 'crop,200x200', 'large' => 'resize,800x800'],
            'path' => 'storage/uploads'
        ],
    ];
    public function Projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getData()
    {
        return $this;
    }

    use HasFactory;
}
