<?php

namespace App\Modules\Config\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class ConfigsEnum
{

    const CONTACT_PAGE = 'contact_us_page',
          ABOUT_PAGE = 'about_us_page',


          CONTACT_PAGE_TITLE='contact_us_page_title',
          CONTACT_PAGE_DESCRIPTION='contact_us_page_description',

          ABOUT_PAGE_TITLE='about_us_page_title',
          ABOUT_PAGE_DESCRIPTION='about_us_page_description',

        SERVICES_TITLE='services_title',
          SERVICES_DESCRIPTION='services_description',

          MISSION_TITLE='mission_title',
          MISSION_DESCRIPTION='mission_description',
          VISION_DESCRIPTION='vision_description',
          YOUTUBE_VIDEO_EMBED_ID='youtube_video_embed_id',


          TEXT='text',
          NUMBER='number',
          ADDRESS='address',
          EMAIL='email',
          URL='url',
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
