<?php

namespace App\Modules\BaseApp;
use App\Modules\Options\Option;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    public function getData() {
        return $this;
    }

    public function getOptions($type=NULL) {
        $query= Option::active();
        if($type) {
            $query=$query->where('type', $type);
        }
        return $query->listsTranslations('title')->pluck('title', 'id')->toArray();
    }

    public function getLoggable()
    {
        return $this->loggable ?? [];
    }
}
