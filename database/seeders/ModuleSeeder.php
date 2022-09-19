<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            //            id 1
            [
                'name' => 'Dashboard Management',
                'route' => 'backend.dashboard.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 2
            [
                'name' => 'Role Management',
                'route' => 'backend.role.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 3
            [
                'name' => 'Module Management',
                'route' => 'backend.module.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 4
            [
                'name' => 'Permission Management',
                'route' => 'backend.permission.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 5
            [
                'name' => 'Gender Management',
                'route' => 'backend.gender.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 6
            [
                'name' => 'Profile Management',
                'route' => 'backend.profile.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 7
            [
                'name' => 'Setting Management',
                'route' => 'backend.setting.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 8
            [
                'name' => 'Category Management',
                'route' => 'backend.category.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 9
            [
                'name' => 'Subcategory Management',
                'route' => 'backend.subcategory.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            id 10
            [
                'name' => 'Author Management',
                'route' => 'backend.author.index',
                'status' => 1,
                'created_by'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('modules')->insert($modules);
    }
}
