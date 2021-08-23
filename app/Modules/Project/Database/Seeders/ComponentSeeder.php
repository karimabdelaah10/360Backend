<?php

namespace App\Modules\Project\Database\Seeders;


use App\Modules\Project\Models\Component;
use App\Modules\Project\Models\ComponentTemplate;
use App\Modules\Project\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('components')->delete();

        $faker = Faker::create();
        $projectsNumber = count(Project::all());
        $elementsName = ['bg_paragraph_m', 'bg_title_m', 'five_image_space', 'four_image', 'four_image_space', 'nextProject', 'one_image_l', 'one_image_m', 'one_image_r', 'paragraph_l', 'paragraph_r', 'six_image_space', 'slider', 'title_l_pragraph_r', 'two_image', 'two_image_space', 'two_paragraph_m'];


        for ($j = 5 * $projectsNumber; $j > 0; $j--) {
            $elementName = $faker->unique()->randomElement($elementsName);
            $component_template_id = ComponentTemplate::where('name', $elementName)->get('id');
            $component = [
                'name' =>$elementName,
                'type' => 'element',
                'value' => 'fake value for testing',
                'section_id' => $j,
                'component_template_id' => $component_template_id[0]->id,
            ];

            Component::create($component);

        }


    }
}
