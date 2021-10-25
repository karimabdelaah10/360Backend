<?php

namespace App\Modules\Config\Database\Seeders;

use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use App\Modules\Contactus\Models\Contactus;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->truncate();
        $configs = [
            [
                'title' => ConfigsEnum::JOBS_PAGE_TITLE,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::JOBS_PAGE,
                'value' => 'Available Opportunities',
            ],
            [
                'title' => ConfigsEnum::CONTACT_PAGE_TITLE,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::CONTACT_PAGE,
                'value' => 'stay in touch',
            ],

            [
                'title' => ConfigsEnum::CONTACT_PAGE_DESCRIPTION,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::CONTACT_PAGE,
                'value' => 'Big picture this is a no-brainer we need to crystallize a plan so turnaround rate nor closer to the metal but organic growth , and on-brand but completeley fresh',
            ],

            [
                'title' => ConfigsEnum::EMAIL,
                'type'  => ConfigsEnum::EMAIL,
                'page' => ConfigsEnum::CONTACT_PAGE,
                'value' => 'hello@pethemes.com',
            ],

            [
                'title' => ConfigsEnum::ADDRESS,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::CONTACT_PAGE,
                'value' => '32 Avenue of the Americas New York, NY 10013',
            ],

            [
                'title' => ConfigsEnum::MOBILE_NUMBER,
                'type'  => ConfigsEnum::NUMBER,
                'page' => ConfigsEnum::CONTACT_PAGE,
                'value' => '+1257895421',
            ],

            [
                'title' => ConfigsEnum::ABOUT_PAGE_TITLE,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::ABOUT_PAGE,
                'value' => 'Hello! We are Pe Themes',
            ],

            [
                'title' => ConfigsEnum::ABOUT_PAGE_DESCRIPTION,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::ABOUT_PAGE,
                'value' => "This vendor is incompetent product launch yet waste of
resources message the initiative diversify kpis high touch client.
Herding cats commitment to the cause yet i also believe it's
important for every member to be involved and invested in our
company.",
            ],

            [
                'title' => ConfigsEnum::SERVICES_TITLE,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::ABOUT_PAGE,
                'value' => 'What we create?',
            ],

            [
                'title' => ConfigsEnum::SERVICES_DESCRIPTION,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::ABOUT_PAGE,
                'value' => "We create world-class digital products,
communications, and brands. Let's see
what we can create for you",
            ],

            [
                'title' => ConfigsEnum::MISSION_TITLE,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::ABOUT_PAGE,
                'value' => "Company Goals",
            ],

            [
                'title' => ConfigsEnum::MISSION_DESCRIPTION,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::ABOUT_PAGE,
                'value' => "Onward and upward, productize the deliverables and
focus on the bottom line this is meaningless core
competencies, or a loss a day will keep you focus but
enough to wash your face but that's mint, well done. Not
the long pole in my tent synergestic actionablesç",
            ],

            [
                'title' => ConfigsEnum::VISION_DESCRIPTION,
                'type'  => ConfigsEnum::TEXT,
                'page' => ConfigsEnum::ABOUT_PAGE,
                'value' => "Eat our own dog food run it up the flagpole,
ping the boss and circle back throughput for
execute , yet mobile friendly. Win-win-win
blue money draw a line in the sand, for going
forward, pivot",
            ],
            [
                'title' => ConfigsEnum::FACEBOOK_URL,
                'type'  => ConfigsEnum::URL,
                'page'  => ConfigsEnum::CONTACT_PAGE,
                'value' => "https://www.facebook.com/",
            ],
            [
            'title' => ConfigsEnum::INSTAGRAM_URL,
            'type'  => ConfigsEnum::URL,
            'page'  => ConfigsEnum::CONTACT_PAGE,
            'value' => "https://www.instagram.com/",
            ],
            [
                'title' => ConfigsEnum::BEHANCE_URL,
                'type'  => ConfigsEnum::URL,
                'page'  => ConfigsEnum::CONTACT_PAGE,
                'value' => "https://www.behance.com/",
            ],
            [
            'title' => ConfigsEnum::LINKEDIN_URL,
            'type'  => ConfigsEnum::URL,
            'page'  => ConfigsEnum::CONTACT_PAGE,
            'value' => "https://www.linkedin.com/",
            ],
            [
                'title' => ConfigsEnum::PINTEREST_URL,
                'type'  => ConfigsEnum::URL,
                'page'  => ConfigsEnum::CONTACT_PAGE,
                'value' => "https://www.pinterest.com/",
            ],
            [
                'title' => ConfigsEnum::YOUTUBE_VIDEO_EMBED_ID,
                'type'  => ConfigsEnum::TEXT,
                'page'  => ConfigsEnum::ABOUT_PAGE,
                'value' => "myvHUM_hmb8",
            ],
            [
                'title' => ConfigsEnum::CONTACT_US_COLOR_SCHEMA,
                'type'  => ConfigsEnum::SELECT,
                'page'  => ConfigsEnum::CONTACT_PAGE,
                'value' => ConfigsEnum::DARK,
            ],

            [
                'title' => ConfigsEnum::ABOUT_US_COLOR_SCHEMA,
                'type'  => ConfigsEnum::SELECT,
                'page'  => ConfigsEnum::ABOUT_PAGE,
                'value' => ConfigsEnum::DARK,
            ],

            [
                'title' => ConfigsEnum::JOBS_COLOR_SCHEMA,
                'type'  => ConfigsEnum::SELECT,
                'page'  => ConfigsEnum::JOBS_PAGE,
                'value' => ConfigsEnum::DARK,
            ],

            [
                'title' => ConfigsEnum::PROJECT_CATEGORY_COLOR_SCHEMA,
                'type'  => ConfigsEnum::SELECT,
                'page'  =>  ConfigsEnum::PROJECT_CATEGORY_PAGE,
                'value' => ConfigsEnum::DARK,
            ],
            [
                'title' => ConfigsEnum::UNDER_CONSTRUCTION,
                'type'  => ConfigsEnum::BOOL,
                'page'  =>  ConfigsEnum::ALL_PAGE,
                'value' => 1,
            ],

        ];
       Config::insert($configs);
    }
}
