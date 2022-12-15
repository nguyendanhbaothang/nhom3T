<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderdetail')->insert([
            'quantity' => 12,
            'total' => 22222232,
            'order_id' => 1,
            'product_id'=>1

        ]);

    }
}
