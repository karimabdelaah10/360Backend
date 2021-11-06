<?php

namespace App\Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['order'];

    public function Components()
    {
        return $this->hasMany(Component::class);
    }

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

}
