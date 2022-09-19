<?php

namespace Database\Seeders;

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
        $users = [
//             [
//                 'username' => 'admin',
//                 'email' => 'admin@localhost.com',
//                 'password'  => Hash::make('admin123'),
//                 'created_at' => now(),
//                 'updated_at' => now(),
// //                'role_id' => 1,
//             ],
            [
                'username' => 'teacher',
                'email' => 'teacher@localhost.com',
                'password'  => Hash::make('teacher123'),
                'created_at' => now(),
                'updated_at' => now(),
//                'role_id' => 2,
            ],
            [
                'username' => 'author',
                'email' => 'author@localhost.com',
                'password'  => Hash::make('author123'),
                'created_at' => now(),
                'updated_at' => now(),
//                'role_id' => 3,
            ],
            [
                'username' => 'publisher',
                'email' => 'publisher@localhost.com',
                'password'  => Hash::make('publisher123'),
                'created_at' => now(),
                'updated_at' => now(),
//                'role_id' => 4,
            ],
            [
                'username' => 'editor',
                'email' => 'editor@localhost.com',
                'password'  => Hash::make('editor123'),
                'created_at' => now(),
                'updated_at' => now(),
//                'role_id' => 5,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
