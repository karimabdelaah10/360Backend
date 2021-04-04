<?php

namespace App\Modules\Config\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class ConfigsEnum
{

    const FACEBOOK_URL = 'facebook_url',
          YOUTUBE_URL='youtube_url',
          EMAIL='email',
          MOBILE_NUMBER='mobile_number',
          WHATSAPP_NUMBER='whatsapp_number',
          MESSENGER_URL='messenger_url',
          AUTO_REGISTER='auto_register'
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
