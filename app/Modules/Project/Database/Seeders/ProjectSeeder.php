<?php

namespace App\Modules\Project\Database\Seeders;

use App\Modules\Project\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();
        $faker = Faker::create();
        $projects = [
            [
                'name' => "11Rosalee Stamm",
                'category' => "landscape",
                'image' => null,
                'description' => "Est nam distinctio harum nesciunt culpa. Eius et ipsum es
t qui enim minima corporis. Voluptatem mollitia ducimus impedit amet sequi corpo
ris. Quo qui reiciendis suscipit nostrum tempore itaque omnis.",
                'colorSchema' => "dark",
                'category_id' => 1,
            ],
            [
                'name' => "22Rosalee ",
                'category' => "landscape",
                'image' => null,
                'description' => "Est nam distinctio harum nesciunt culpa. Eius et ipsum es
t qui enim minima corporis. Voluptatem mollitia ducimus impedit amet sequi corpo
ris. Quo qui reiciendis suscipit nostrum tempore itaque omnis.",
                'colorSchema' => "light",
                'category_id' => 1,
            ]
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
