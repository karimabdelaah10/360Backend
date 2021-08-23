<?php

namespace App\Modules\Config\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class ConfigsEnum
{

    const CONTACT_PAGE = 'contact_us_page',
          ABOUT_PAGE = 'about_us_page',
          JOBS_PAGE = 'jobs_page',
          PROJECT_CATEGORY_PAGE = 'project_category_page',
          ALL_PAGE='all_pages',


          CONTACT_PAGE_TITLE='contact_us_page_title',
          CONTACT_PAGE_DESCRIPTION='contact_us_page_description',

          ABOUT_PAGE_TITLE='about_us_page_title',
          ABOUT_PAGE_DESCRIPTION='about_us_page_description',

          JOBS_PAGE_TITLE='jobs_page_title',

          SERVICES_TITLE='services_title',
          SERVICES_DESCRIPTION='services_description',

          MISSION_TITLE='mission_title',
          MISSION_DESCRIPTION='mission_description',
          VISION_DESCRIPTION='vision_description',

          FACEBOOK_URL='facebook_url',
          INSTAGRAM_URL='instagram_url',
          BEHANCE_URL='behance_url',
          LINKEDIN_URL='linkedin_url',
          PINTEREST_URL='pinterest_url',

          YOUTUBE_VIDEO_EMBED_ID='youtube_video_embed_id',
          CONTACT_US_COLOR_SCHEMA='contact_us_color_schema',
          ABOUT_US_COLOR_SCHEMA='about_us_color_schema',
          JOBS_COLOR_SCHEMA='jobs_color_schema',
          PROJECT_CATEGORY_COLOR_SCHEMA='project_category_color_schema',

        DARK='dark',
        LIGHT='light',

          TEXT='text',
          SELECT='select',
          NUMBER='number',
          ADDRESS='address',
          EMAIL='email',
          URL='url',
          MOBILE_NUMBER='mobile_number'
;
    public static function getColorsSelectors()
    {
        return [self::DARK => self::DARK,
                self::LIGHT => self::LIGHT
        ];
    }
    public static function getColorSchema()
    {
        return [
            self::DARK => ['site-layout' => self::DARK, 'menu-layout' => self::LIGHT],
            self::LIGHT => ['site-layout' => self::LIGHT, 'menu-layout' => self::DARK]
        ];
    }
}
