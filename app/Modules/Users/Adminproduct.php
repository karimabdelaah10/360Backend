<?php

namespace App\Modules\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminproduct extends Model
{
    use HasFactory;
    protected $table='adminproducts';
    protected $fillable=['user_id' ,'product_id'];
}
