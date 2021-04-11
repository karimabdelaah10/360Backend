<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $project_ids=[1]; //get project id from data or hardCode it .
        return [

            'order' => $this->faker->unique()->randomElement([1,2,3,4,5]),
            'wrapperType' => $this->faker->randomElement(['lg','sm','mid']),
            'backgroundColor' => $this->faker->randomElement['black'],
            'project_id' => $this->faker->randomElement($project_ids),

        ];
    }
}
