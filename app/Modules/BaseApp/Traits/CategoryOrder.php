<?php

namespace App\Modules\BaseApp\Traits;

use Illuminate\Support\Facades\DB;

trait CategoryOrder
{

    public static function bootCategoryOrder()
    {
        static::saved(function ($model) {
            if ($model->parent_id == null) {
                $oldIndex = $model->menu_order ?? $model->where('parent_id', null)->count();
                $newIndex = request()->menu_order > $model->where('parent_id', null)->count() ? $model->count() : request()->menu_order;
                DB::table($model->table)->where('id', $model->id)->update(['menu_order' => $newIndex]);
                if ($newIndex != $oldIndex) {
                    self::reArrangeCategoryOrder($oldIndex, $newIndex, $model, 'menu_order');
                }
            }
        });
    }

    public static function reArrangeCategoryOrder($oldIndex, $newIndex, $model, $col)
    {
        if ($oldIndex > $newIndex) {
            DB::table($model->table)
                ->where('parent_id', null)
                ->where($col, '>=', $newIndex)
                ->where($col, '<', $oldIndex)
                ->where('id', '!=', $model->id) // to skip this element
                ->increment($col);
        } elseif ($oldIndex < $newIndex) {
            DB::table($model->table)
                ->where('parent_id', null)
                ->where($col, '<=', $newIndex)
                ->where($col, '>', $oldIndex)
                ->where('id', '!=', $model->id)
                ->decrement($col);
        }
    }
}
