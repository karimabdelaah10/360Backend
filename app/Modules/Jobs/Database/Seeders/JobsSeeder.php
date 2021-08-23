<?php

namespace App\Modules\Jobs\Database\Seeders;

use App\Modules\Jobs\Models\Job;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->truncate();
        $faker =Faker::create();
        $data=[];
        for ($i=0 ; $i<50 ; $i++){
            Job::create([
                'title'=>$faker->jobTitle,
                'description'=>$faker->text,
            ]);
        }
    }
}
