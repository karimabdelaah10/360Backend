<?php

namespace App\Modules\BaseApp\Traits;

use Illuminate\Support\Facades\DB;

trait Order
{

    public static function bootOrder()
    {
        static::saved(function ($model) {
            if ($model->table != null) {
                foreach ($model->ordersCols as $col) {
                    $oldIndex = $model->$col ?? $model->count();
                    if (isset(\request()->$col)) {
                        $newIndex = request()->$col > $model->count() ? $model->count() : request()->$col;
                        DB::table($model->table)->where('id', $model->id)->update([$col => $newIndex]);
                        if ($newIndex != $oldIndex) {
                            self::reArrangeOrder($oldIndex, $newIndex, $model, $col);
                        }
                    }
                }
            }
        });
    }

    public static function reArrangeOrder($oldIndex, $newIndex, $model, $col)
    {
        if ($oldIndex > $newIndex) {
            DB::table($model->table)->where($col, '>=', $newIndex)
                ->where($col, '<', $oldIndex)
                ->where('id', '!=', $model->id) // to skip this element
                ->increment($col);
        } elseif ($oldIndex < $newIndex) {
            DB::table($model->table)->where($col, '<=', $newIndex)
                ->where($col, '>', $oldIndex)
                ->where('id', '!=', $model->id)
                ->decrement($col);
        }
        $rows = DB::table($model->table)->get();
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
