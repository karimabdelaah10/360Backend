<?php

namespace Database\Seeders;

use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->delete();

        $configs=[
        [
            'title'=>ConfigsEnum::FACEBOOK_URL,
            'value'=>'https://www.facebook.com/',
            'type'=>'text'
        ],
        [
            'title'=>ConfigsEnum::YOUTUBE_URL,
            'value'=>'https://www.youtube.com/',
            'type'=>'text'

        ],
        [
            'title'=>ConfigsEnum::EMAIL,
            'value'=>'mail@mail.com',
            'type'=>'text'

        ],
        [
            'title'=>ConfigsEnum::MOBILE_NUMBER,
            'value'=>'010000'.rand(11111, 99999),
            'type'=>'text'

        ],
        [
            'title'=>ConfigsEnum::WHATSAPP_NUMBER,
            'value'=>'010000'.rand(11111, 99999),
            'type'=>'text'

        ],
        [
            'title'=>ConfigsEnum::MESSENGER_URL,
            'value'=>'karimabdelaah.dev',
            'type'=>'text'
        ],
        [
            'title'=>ConfigsEnum::AUTO_REGISTER,
            'value'=>0,
            'type'=>'switch'
        ],
        ];
        foreach ($configs as $config){
            Config::create($config);
        }
    }
}
