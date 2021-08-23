<?php

namespace App\Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentTemplate extends Model
{
    use HasFactory;
    public function templateFields(){
        return $this->hasMany(ComponentTemplateField::class);
    }
}
