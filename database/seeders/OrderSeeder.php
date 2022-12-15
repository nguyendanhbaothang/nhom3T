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
                'total' => 2211111,
               'date_at' => '2003/11/11'
        ],[
            'customer_id'=>2,
            'total' => 2211111444,
            'date_at' => '2003/11/01'
        ]
    ]);
    }
}
