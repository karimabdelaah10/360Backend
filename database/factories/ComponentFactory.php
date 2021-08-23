<?php

namespace Database\Factories;

use App\Models\Component;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComponentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Component::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $elementsName=['bg-t-m','2p-m','p-l','p-r','t-r-p-l','bg-p-m','1i-m','1i-l','1i-r','2i-space','4i-space','5i-space','6i-space','2i','4i','slider'];
        return [
            'name' => $this->faker->unique()->randomElement($elementsName),
            'type' =>'element',
            'value' => 'fake value for testing',
            'section_id' => 2,
        ];
    }
}
