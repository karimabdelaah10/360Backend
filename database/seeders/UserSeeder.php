<?php

namespace Database\Seeders;

use App\Modules\Users\Enums\AdminEnum;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $faker =Faker::create();

        $users = [
            [
                'name'              =>$faker->name,
                'type'              =>UserEnum::SUPER_ADMIN,
                'address'           =>$faker->address,
                'email'             =>$faker->email,
                'mobile_number'     =>'01091811793',
                'password'          =>'password',
            ],
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
