<?php

namespace App\Modules\Contactus\Database\Seeders;

use App\Modules\Contactus\Models\Contactus;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactuses')->truncate();
        $faker =Faker::create('ar_JO');
        $data=[];
        for ($i=0 ; $i<50 ; $i++){
            Contactus::create([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'mobile_number'=>$faker->phoneNumber,
                'message'=>$faker->text,
            ]);
        }
    }
}
