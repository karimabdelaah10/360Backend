<?php

namespace App\Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public function Components(){
        return $this->hasMany(Component::class);
    }
}