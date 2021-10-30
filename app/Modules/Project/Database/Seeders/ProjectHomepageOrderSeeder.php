<?php

namespace App\Modules\Project\Database\Seeders;

use App\Modules\Project\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectHomepageOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $projects =  Project::where(
           [
               ['homepage',1],
           ])->get();

       $i=1;
       foreach ($projects as $project){
        $project->update([
            'homepage_order'=>$i
        ]);
        $i++;
       }

    }
}
