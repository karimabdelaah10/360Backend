<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentTemplate extends Model
{
    use HasFactory;
    public function componentTemplateField(){
        return $this->hasMany(ComponentTemplateField::class);
    }
}
