<?php

namespace App\Modules\Users\Enums;

abstract class UserEnum
{
    /**
     * List of all Work types used in customers table
     */
    public const SUPER_ADMIN  = "super_admin",
                 ADMIN = "admin";

    public static function usersTypes()
    {
        return [self::SUPER_ADMIN, self::ADMIN];
    }
}
