<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Modules\Config\Database\Seeders\ConfigsSeeder;
use App\Modules\Contactus\Database\Seeders\ContactusSeeder;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call(UserSeeder::class);
//        $this->call(ProjectSeeder::class);
//        $this->call(SectionSeeder::class);
//        $this->call(ComponentSeeder::class);
//        $this->call(ComponentFieldSeeder::class);
//        $this->call(ContactusSeeder::class);
        $this->call(ConfigsSeeder::class);
    }
}
