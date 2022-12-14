<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
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
            'name' => 'Nguyen Thi Thao Tam',
                'address' => 'Dong Ha',
                'phone' => '123456789',
                'email' => 'tam@gmail.com',
                'total' => 2211111,
               'date_at' => '2003/11/11'
        ],[
            'name' => 'Nguyen Thi Thao Tam',
            'address' => 'Dong Ha',
            'phone' => '123456789',
            'email' => 'tam@gmail.com',
            'total' => 2211111444,
            'date_at' => '2003/11/01'
        ]
    );
    }
}
