<?php

namespace App\Modules\Category\Models;

use App\Modules\Project\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'image'];

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
