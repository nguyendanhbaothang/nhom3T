<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders')->insert([
             [   'customer_id'=>1,
                'total' => 200000000,
               'date_at' => '2003/11/11',
            'status'=> 0,

        ],
        [
            'customer_id'=>2,
            'total' => 200000000,
            'date_at' => '2003/11/01',
            'status'=> 1,
        ],
        [
            'customer_id'=>2,
            'total' => 200000000,
            'date_at' => '2003/11/01',
            'status'=> 1,
        ],
        [
            'customer_id'=>2,
            'total' => 200000000,
            'date_at' => '2003/11/01',
            'status'=> 0,
        ]
    ]);
    }
}
