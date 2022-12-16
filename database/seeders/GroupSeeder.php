<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Admin'
        ]);
        DB::table('groups')->insert([
            'name' => 'Quản Lí'
        ]);
        DB::table('groups')->insert([
            'name' => 'Nhân Viên'
        ]);
    }
}
