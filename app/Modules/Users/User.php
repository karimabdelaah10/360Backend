<?php

namespace App\Modules\Users;

use App\Modules\BaseApp\Traits\CreatedBy;
use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\MoneyProcess\Models\Transaction;
use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Product;
use App\Modules\Users\Enums\UserEnum;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasAttach, Notifiable ;

    protected static $attachFields = [
        'profile_picture' => [
            'sizes' => ['small' => 'crop,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ],
    ];
    protected $table = "users";
    protected $fillable = [
        'type',
        'name',
        'address',
        'email',
        'mobile_number',
        'is_active',
        'password',
        'profile_picture',
    ];

    public function setPasswordAttribute($value)
    {
        if (trim($value)) {
            $this->attributes['password'] = bcrypt(trim($value));
        }
    }
    public function getProfilePictureAttribute($value): string
    {
        if (!empty($value)){
            return image($value , 'large');
        }
        return  url('/images/150.PNG');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }



    public function scopeNotSuperAdmin($query)
    {
        return $query->where('type', '!=', UserEnum::SUPER_ADMIN);
    }
    public function scopeAdmin($query)
    {
        return $query->where('type', '=', UserEnum::ADMIN);
    }

   public function scopeFiltered($query)
    {
        if (request()->query('not-verified')){
             $query->where('is_verified', '=', 0);
        }
        return $query;
    }

    public function scopeWithoutLoggedUser($query)
    {
        return $query->where('id', '!=', auth()->id());
    }

    public function getData()
    {
        return $this->withoutLoggedUser()
            ->notsuperadmin()
            ->when(request('type'), function ($q) {
                return $q->where('type', request('type'));
            })
            ->when(request('deleted') == 'yes', function ($q) {
                return $q->onlyTrashed();
            });
    }

}
