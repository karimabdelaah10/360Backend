<?php

namespace App\Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    public function Fields(){
        return $this->hasMany(ComponentField::class);
    }
    public function ComponentTemplate()
    {
        return $this->belongsTo(ComponentTemplate::class);
    }

}
