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
            [
            'name' => 'Apple watch series 8',
            'price' => 20000000,
            'quantity' => 3,
            'description' => 'Sản phẩm bán chạy nhất năm',
            'category_id' => 4,
            'image'=> 'a.jpg',
            'status' => 1,
            'product_hot' => 1,
            ],
            [
            'name' => 'Rolex Cosmograph ',
            'price' => 200000000,
            'quantity' => 3,
            'description' => 'Sản phẩm bán chạy nhất năm',
            'category_id' => 2,
            'image'=> 'rolex.jpg',
            'status' => 1,
            'product_hot' => 1,
            ],
            [
                'name' => 'Hublot Classic',
                'price' => 20000000,
                'quantity' => 3,
                'description' => 'Sản phẩm bán chạy nhất năm',
                'category_id' => 3,
                'image'=> 'hubot.jpg',
                'status' => 1,
                'product_hot' => 1,
            ],
            [
                'name' => 'Audemars Piguet Royal',
                'price' => 20000000,
                'quantity' => 3,
                'description' => 'Sản phẩm bán chạy nhất năm',
                'category_id' => 1,
                'image'=> 'au.jpg',
                'status' => 1,
                'product_hot' => 1,
                ]

        ]);
    }
}
