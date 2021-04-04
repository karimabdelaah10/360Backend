<?php

namespace App\Modules\Users\Resources;

use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
            'id' => (int)$item->id,
            'name' => $item->name,
            'email' => $item->email,
            'mobile_number' => $item->mobile_number,
            'image' => @$item->profile_picture,
            'url' => url('/users/view', $item->id),
            ];

        });

    }

}
