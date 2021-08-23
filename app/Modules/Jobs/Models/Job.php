<?php

namespace App\Modules\Jobs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table='jobs';
    protected $fillable =['title'  , 'description'];

    public function getData()
    {
        return $this;
    }
}
