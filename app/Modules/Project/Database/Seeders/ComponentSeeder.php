<?php

namespace Database\Seeders;

use App\Models\Component;
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
        $components = [
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 1,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 1,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 1,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 1,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 1,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 2,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 2,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 2,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 2,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 2,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 3,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 3,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 3,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 3,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 3,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 4,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 4,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 4,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 4,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 4,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 5,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 5,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 5,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 5,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 5,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 6,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 6,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 6,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 6,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 6,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 7,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 7,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 7,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 7,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 7,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 8,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 8,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 8,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 8,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 8,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 9,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 9,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 9,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 9,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 9,
            ],
            [
                "name" => "1i-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 10,
            ],
            [
                "name" => "bg-p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 10,
            ],
            [
                "name" => "2p-m",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 10,
            ],
            [
                "name" => "1i-r",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 10,
            ],
            [
                "name" => "t-r-p-l",
                "type" => "element",
                "value" => "fake value for testing",
                "section_id" => 10,
            ],
        ];
        foreach ($components as $component) {
            Component::create($component);
        }

    }
}
