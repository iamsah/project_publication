<?php

namespace Database\Seeders;

use App\Models\Author;
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
        $this->call([
            // RoleSeeder::class,
            // GenderSeeder::class,
            // UserSeeder::class,
            AuthorSeeder::class,
            CategorySeeder::class,
            DegreeSeeder::class,
            FacultySeedering::class,
            ModuleSeeder::class,
            PermissionSeeder::class,
            ProfileSeeder::class,
            SettingSeeder::class,
            SubcategorySeederman::class,
        ]);

    }
}
