<?php

namespace App\Modules\Project\Database\Seeders;


use App\Modules\Project\Models\Section;
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
    //not created yet

    }
}
