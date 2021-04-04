<?php

namespace App\Modules\BaseApp\Transformers;

use League\Fractal\TransformerAbstract;
use Illuminate\Database\Eloquent\Model;

class BaseMetaTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    ];
    protected $availableIncludes = [
    ];

    /**
     * @param Model $model
     * @return array
     */
    public function transform(Model $model)
    {
        $transfromedData =  [
            'id' => (int) $model->id,
            'meta_title' => (string) $model->meta_title ?? '',
            'meta_keywords' => (string) $model->meta_keywords ?? '',
            'meta_description' => (string) $model->meta_description ?? '',
        ];
        return $transfromedData;
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'meta_title' => 'meta_title',
            'meta_keywords' => 'meta_keywords',
            'meta_description' => 'meta_description'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'meta_title' => 'meta_title',
            'meta_keywords' => 'meta_keywords',
            'meta_description' => 'meta_description'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

}
