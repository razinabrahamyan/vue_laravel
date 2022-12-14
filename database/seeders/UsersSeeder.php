<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserInfo;
use Faker\Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $role = new Role();
        $role->role = 'admin';
        $role->save();

        $role = new Role();
        $role->role = 'user';
        $role->save();

        $demoUser = User::create([
            'first_name'        => $faker->firstName,
            'last_name'         => $faker->lastName,
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'role_id' => 1
        ]);


        $this->addDummyInfo($faker, $demoUser);
        $demoUser = User::create([
            'first_name'        => $faker->firstName,
            'last_name'         => $faker->lastName,
            'email'             => 'user@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'role_id' => 2
        ]);
        $this->addDummyInfo($faker, $demoUser);
    }

    private function addDummyInfo(Generator $faker, User $user)
    {
        $dummyInfo = [
            'company'  => $faker->company,
            'phone'    => $faker->phoneNumber,
            'website'  => $faker->url,
            'language' => $faker->languageCode,
            'country'  => $faker->countryCode,
        ];

        $info = new UserInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->user()->associate($user);
        $info->save();
    }
}
