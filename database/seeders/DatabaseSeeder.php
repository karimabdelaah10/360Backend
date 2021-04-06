<?php

namespace Database\Seeders;

use App\Modules\Contactus\Database\Seeders\ContactusSeeder;
use Illuminate\Database\Seeder;

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
//        $this->call(ConfigSeeder::class);

        $this->call(ContactusSeeder::class);
    }
}
