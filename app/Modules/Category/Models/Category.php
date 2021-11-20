<?php

namespace App\Modules\Category\Models;

use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\Project\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use  HasAttach;

    protected $fillable = ['name', 'description', 'parent_id', 'image'];

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

    public function parent()
    {
        return $this->belongsTo(self::class , 'parent_id');
    }

    public function chlids()
    {
        return $this->hasMany(self::class , 'parent_id');
    }

    public function getData()
    {
        return $this;
    }

    public function scopeHeaderCategories($query)
    {
        $query->whereDoesntHave('parent')
//            ->whereHas('Projects')
            ->with('chlids');
        return $query;
    }

    use HasFactory;
}
