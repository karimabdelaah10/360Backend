<?php

namespace Database\Seeders;


use App\Modules\Aboutus\Database\Seeders\ServiceSeeder;

use App\Modules\Category\Database\Seeders\CategorySeeder;
use App\Modules\Config\Database\Seeders\ConfigsSeeder;
use App\Modules\Contactus\Database\Seeders\ContactusSeeder;
use App\Modules\Jobs\Database\Seeders\JobsSeeder;
use App\Modules\Project\Database\Seeders\ComponentFieldSeeder;
use App\Modules\Project\Database\Seeders\ComponentSeeder;
use App\Modules\Project\Database\Seeders\ComponentsTemplateFieldsSeeder;
use App\Modules\Project\Database\Seeders\ComponentsTemplateSeeder;
use App\Modules\Project\Database\Seeders\ProjectSeeder;
use App\Modules\Project\Database\Seeders\SectionSeeder;
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

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
//        $this->call(ProjectSeeder::class);
//        $this->call(SectionSeeder::class);
        $this->call(ComponentsTemplateSeeder::class);
        $this->call(ComponentsTemplateFieldsSeeder::class);
//        $this->call(ComponentSeeder::class);
//        $this->call(ComponentFieldSeeder::class);
        $this->call(ContactusSeeder::class);
        $this->call(ConfigsSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(JobsSeeder::class);

    }
}
