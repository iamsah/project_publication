<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'first_name' => 'author1',
                'middle_name' => 'prasad1',
                'last_name' => 'sah1',
                'email' => 'author1@localhost.com',
                'contact' => '9800000000',
                'address' => 'Kathmandu',
                'gender_id'  => 1,
                'dob'  => now(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'author2',
                'last_name' => 'sah2',
                'email' => 'author2@localhost.com',
                'contact' => '9800000000',
                'address' => 'Kathmandu',
                'gender_id'  => 2,
                'dob'  => now(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'author3',
                'last_name' => 'sah3',
                'email' => 'author3@localhost.com',
                'contact' => '9800000000',
                'address' => 'Kathmandu ',
                'gender_id'  => 3,
                'dob'  => now(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('authors')->insert($authors);
    }
}
