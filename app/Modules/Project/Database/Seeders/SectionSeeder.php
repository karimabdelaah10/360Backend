<?php

namespace Database\Seeders;

use App\Models\Section;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $faker = Faker::create();

        $sections = [
            [
                'order' => 5,
                'wrapperType' => "wrapper",
                'backgroundColor' => "a",
                'project_id' => 1,

            ],
            [
                'order' => 1,
                'wrapperType' => "wrapper",
                'backgroundColor' => "a",
                'project_id' => 1,

            ],
            [
                'order' => 3,
                'wrapperType' => "wrapper-full",
                'backgroundColor' => "a",
                'project_id' => 1,

            ],
            [
                'order' => 4,
                'wrapperType' => "wrapper-small",
                'backgroundColor' => "c",
                'project_id' => 1,

            ],
            [
                'order' => 2,
                'wrapperType' => "wrapper-small",
                'backgroundColor' => "a",
                'project_id' => 1,

            ],


            [
                'order' => 5,
                'wrapperType' => "wrapper",
                'backgroundColor' => "a",
                'project_id' => 2,

            ],
            [
                'order' => 1,
                'wrapperType' => "wrapper",
                'backgroundColor' => "a",
                'project_id' => 2,

            ],
            [
                'order' => 3,
                'wrapperType' => "wrapper-full",
                'backgroundColor' => "a",
                'project_id' => 2,

            ],
            [
                'order' => 4,
                'wrapperType' => "wrapper-small",
                'backgroundColor' => "c",
                'project_id' => 2,

            ],
            [
                'order' => 2,
                'wrapperType' => "wrapper-small",
                'backgroundColor' => "a",
                'project_id' => 2,

            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
