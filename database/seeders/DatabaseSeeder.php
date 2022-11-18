<?php

namespace Database\Seeders;

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
        $this->call([
            UsersSeeder::class,
            QuestionSeeder::class,
            CategorySeeder::class,
            // PermissionsSeeder::class,
            // RolesSeeder::class,
        ]);
    }
}
