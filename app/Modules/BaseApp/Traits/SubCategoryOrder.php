<?php

namespace App\Modules\BaseApp\Traits;

use Illuminate\Support\Facades\DB;

trait SubCategoryOrder
{

    public static function bootSubCategoryOrder()
    {
        static::saved(function ($model) {
            if ($model->parent_id != null) {
                $oldIndex = $model->category_order ?? $model->where('parent_id', $model->parent_id)->count();
                $newIndex = request()->category_order > $model->where('parent_id', $model->parent_id)->count() ? $model->where('parent_id', $model->parent_id)->count() : request()->category_order;

                DB::table($model->table)->where('id', $model->id)->update(['category_order' => $newIndex]);
                if ($newIndex != $oldIndex) {
                    self::reArrangeSubCategoryOrder($oldIndex, $newIndex, $model, 'category_order');
                }
            }
        });
    }

    public static function reArrangeSubCategoryOrder($oldIndex, $newIndex, $model, $col)
    {
        if ($oldIndex > $newIndex) {
            DB::table($model->table)
                ->where('parent_id', $model->parent_id)
                ->where($col, '>=', $newIndex)
                ->where($col, '<', $oldIndex)
                ->where('id', '!=', $model->id) // to skip this element
                ->increment($col);
        } elseif ($oldIndex < $newIndex) {
            DB::table($model->table)
                ->where('parent_id', $model->parent_id)
                ->where($col, '<=', $newIndex)
                ->where($col, '>', $oldIndex)
                ->where('id', '!=', $model->id)
                ->decrement($col);
        }
    }
}
