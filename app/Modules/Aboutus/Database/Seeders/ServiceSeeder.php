<?php

namespace App\Modules\Aboutus\Database\Seeders;

use App\Modules\Aboutus\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->truncate();

        $services = [
            [
                'title'=> 'Creative direction',
                'description'=>'Our new office is located in a workshop in a paved courtyard typical of Belleville. This long building mixes several living and creative spaces on different levels: a large open space for shared work'
            ],
            [
                'title'=> 'Brand Indentity',
                'description'=>'Our new office is located in a workshop in a paved courtyard typical of Belleville. This long building mixes several living and creative spaces on different levels: a large open space for shared work'
            ],
            [
                'title'=> 'UI/UX Design',
                'description'=>'Our new office is located in a workshop in a paved courtyard typical of Belleville. This long building mixes several living and creative spaces on different levels: a large open space for shared work'
            ],
            [
                'title'=> 'Video / Animation',
                'description'=>'Our new office is located in a workshop in a paved courtyard typical of Belleville. This long building mixes several living and creative spaces on different levels: a large open space for shared work'
            ],
            [
                'title'=> 'Creative direction',
                'description'=>'Our new office is located in a workshop in a paved courtyard typical of Belleville. This long building mixes several living and creative spaces on different levels: a large open space for shared work'
            ],

        ];

        Service::insert($services);
    }
}
