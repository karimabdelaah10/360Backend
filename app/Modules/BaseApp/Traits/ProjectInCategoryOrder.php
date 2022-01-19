<?php

namespace App\Modules\BaseApp\Traits;

use Illuminate\Support\Facades\DB;

trait ProjectInCategoryOrder
{

    public static function bootProjectInCategoryOrder()
    {
        static::saved(function ($model) {
            if ($model->table != null) {
                $oldIndex = $model->category_order ?? $model->where('category_id', $model->category_id)->count();
                $newIndex = request()->category_order > $model->where('category_id', $model->category_id)->count() ?
                    $model->where('category_id', $model->category_id)->count() :
                    request()->category_order;
                if ($newIndex != null) {
                    DB::table($model->table)->where('id', $model->id)->update(['category_order' => $newIndex]);
                    if ($newIndex != $oldIndex) {
                        self::reArrangeProjectInCategoryOrder($oldIndex, $newIndex, $model, 'category_order');
                    }
                }
            }
        });
    }

    public static function reArrangeProjectInCategoryOrder($oldIndex, $newIndex, $model, $col)
    {
        if ($oldIndex > $newIndex) {
            DB::table($model->table)
                ->where('category_id', $model->category_id)
                ->where($col, '>=', $newIndex)
                ->where($col, '<', $oldIndex)
                ->where('id', '!=', $model->id) // to skip this element
                ->increment($col);
        } elseif ($oldIndex < $newIndex) {
            DB::table($model->table)
                ->where('category_id', $model->category_id)
                ->where($col, '<=', $newIndex)
                ->where($col, '>', $oldIndex)
                ->where('id', '!=', $model->id)
                ->decrement($col);
        }
        $rows = DB::table($model->table)->where('category_id', $model->category_id)->get();
        $i = 1;
        if (count($rows)) {
            foreach ($rows as $row) {
                if ($row->$col != $i) {
                    $row->update([$col => $i]);
                }
                $i++;
            }
        }
    }
}
