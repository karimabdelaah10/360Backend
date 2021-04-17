<?php

namespace Database\Seeders;

use App\Models\Project;
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
                'title' => "Mills Group",
                'description' => "Est nam distinctio harum nesciunt culpa. Eius et ipsum es
t qui enim minima corporis. Voluptatem mollitia ducimus impedit amet sequi corpo
ris. Quo qui reiciendis suscipit nostrum tempore itaque omnis.",
                'colorSchema' => "dark",
            ],
            [
                'name' => "22Rosalee ",
                'category' => "landscape",
                'title' => "Mills Group",
                'description' => "Est nam distinctio harum nesciunt culpa. Eius et ipsum es
t qui enim minima corporis. Voluptatem mollitia ducimus impedit amet sequi corpo
ris. Quo qui reiciendis suscipit nostrum tempore itaque omnis.",
                'colorSchema' => "light",
            ]
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
