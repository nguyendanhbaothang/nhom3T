<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('orders')
    ->join('customers', 'orders.customer_id', '=', 'customers.id')
    ->select('customers.name', 'orders.total','orders.created_at','email','phone'
    )->get();
    }
    public function headings() :array
{
    return ["Tên Sản Phẩm", "Giá(VND)","Ngày mua","Email","Số điện thoại"];
}

}
