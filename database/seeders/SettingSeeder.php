<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name' => 'Org Name',
                'email' => 'publication@localhost.com',
                'address' => 'Kathmandu ,Baluwatar -5',
                'phone'  => '9800000000',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('settings')->insert($settings);
    }
}
