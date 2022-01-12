<?php

namespace App\Modules\Aboutus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['title', 'description'];

    public function getData()
    {
        return $this;
    }
}
