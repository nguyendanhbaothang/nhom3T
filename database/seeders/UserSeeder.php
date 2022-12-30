<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new User();
        $item->name = "Nguyễn Thi Thao Tam";
        $item->email = "tam@gmail.com";
        $item->password = Hash::make('123456');
        $item->address = 'Quảng Trị';
        $item->phone  = "0901170243";
        $item->image ='tam.jpg';
        $item->gender ='Nữ';
        $item->birthday ='1997/02/24';
        $item->group_id ='1';
        // $item->image ='thang.ipg';
        $item->save();
        $item = new User();
        $item->name = "Nguyễn Thi Thao Tam11";
        $item->email = "nguyendanhbaothang9a@gmail.com";
        $item->password = Hash::make('123456');
        $item->address = 'Quảng Trị';
        $item->phone  = "0901170242";
        $item->image ='tam.jpg';
        $item->gender ='Nữ';
        $item->birthday ='1997/02/24';
        $item->group_id ='1';
        // $item->image ='thang.ipg';
        $item->save();
    }
}
