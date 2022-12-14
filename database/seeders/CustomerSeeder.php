<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Nguyen Danh Bao Thang',
                'address' => 'Dong Ha',
                'phone' => '123456789',
                'email' => 'thang@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'Nguyen Thi Thao Tam',
                'address' => 'Dong Ha',
                'phone' => '123456789',
                'email' => 'tam@gmail.com',
                'password' => '12345678'
            ]
        ]);
    }
}
