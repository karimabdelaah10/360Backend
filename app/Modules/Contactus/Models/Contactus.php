<?php

namespace App\Modules\Contactus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;
    protected $table ='contactuses';
    protected $fillable =[
        'name',
        'email',
        'mobile_number',
        'message'
    ];

    public function getData()
    {
        return $this;
    }
}
