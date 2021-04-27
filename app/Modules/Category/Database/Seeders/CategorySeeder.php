<?php

namespace App\Modules\Category\Database\Seeders;

use App\Modules\Category\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $faker = Faker::create();
        $elements = [
            [
                'name' => "11Rosalee Stamm",
                'description' => "Est nam distinctio harum nesciunt culpa. Eius et ipsum es
t qui enim minima corporis. Voluptatem mollitia ducimus impedit amet sequi corpo
ris. Quo qui reiciendis suscipit nostrum tempore itaque omnis.",
                'image'=>'empty img',

            ],
            [
                'name' => "22Rosalee ",
                'description' => "Est nam distinctio harum nesciunt culpa. Eius et ipsum es
t qui enim minima corporis. Voluptatem mollitia ducimus impedit amet sequi corpo
ris. Quo qui reiciendis suscipit nostrum tempore itaque omnis.",
                'image'=>'empty img',

            ]
        ];
        foreach ($elements  as $element) {
            Category::create($element);
        }
    }
}
