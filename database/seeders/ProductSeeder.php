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
        DB::table('products')->insert([
            'name' => 'Đồng hồ',
            'price' => 10000000,
            'quantity' => 3,
            'description' => 'Sản phẩm bán chạy nhất năm',
            'category_id' => 1,
            'image'=> 'thang.jpg',
            'status' => 'Outstanding',
        ]);
    }
}
