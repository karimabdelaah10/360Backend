<?php

namespace App\Modules\Config\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table='configs';
    protected $fillable=['title','value' ,'type','page'];
}
