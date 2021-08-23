<?php

namespace App\Modules\Jobs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobcv extends Model
{
    use HasFactory;
    protected $table = 'jobcvs';
    protected $fillable = ['name' , 'subject' , 'cv_url'];

    public function getData()
    {
        return $this;
    }
}
