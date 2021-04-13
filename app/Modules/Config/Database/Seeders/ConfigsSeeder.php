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
        $faker =Faker::create('ar_JO');
        $configs = [
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

        ];
       Config::insert($configs);
    }
}
