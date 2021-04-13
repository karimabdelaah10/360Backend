<?php

namespace App\Modules\Config\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class ConfigsEnum
{

    const CONTACT_PAGE = 'contact_us_page',
          CONTACT_PAGE_TITLE='contact_us_page_title',
          CONTACT_PAGE_DESCRIPTION='contact_us_page_description',
          TEXT='text',
          NUMBER='number',
          ADDRESS='address',
          EMAIL='email',
          MOBILE_NUMBER='mobile_number'
;
    public static function conigsTitls()
    {
//        return [GeneralEnum::PENDING, GeneralEnum::UNDER_REVIEW , GeneralEnum::TRANSFORMED];
    }
    public static function conigsTitlsForSelector()
    {
//        return [GeneralEnum::PENDING  => trans('app.'.GeneralEnum::PENDING),
//            GeneralEnum::UNDER_REVIEW => trans('app.'.GeneralEnum::UNDER_REVIEW),
//            GeneralEnum::TRANSFORMED  => trans('app.'.GeneralEnum::TRANSFORMED)];
    }
}
