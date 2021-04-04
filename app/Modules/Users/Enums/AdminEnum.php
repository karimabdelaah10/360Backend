<?php

namespace App\Modules\Users\Enums;

abstract class AdminEnum
{
    /**
     * List of all Work types used in customers table
     */
    public const PRODUCT_ADMIN  = "product_admin",
                 FINANCIAL_ADMIN = "financial_admin";

    public static function adminsTypes()
    {
        return [self::PRODUCT_ADMIN, self::FINANCIAL_ADMIN ];
    }    public static function usersTypesForSelector()
    {
        return [
            self::PRODUCT_ADMIN  => trans('admin.'.self::PRODUCT_ADMIN),
            self::FINANCIAL_ADMIN => trans('admin.'.self::FINANCIAL_ADMIN)
        ];
    }
}
