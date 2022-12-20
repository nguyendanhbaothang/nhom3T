<?php

namespace App\Repositories\Eloquents;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }
    public function all($request)
    {
        return Order::orderBy('id', 'DESC')->get();
    }
    public function find($id)
    {
        $items = DB::table('orderdetail')
            ->join('orders', 'orderdetail.order_id', '=', 'orders.id')
            ->join('products', 'orderdetail.product_id', '=', 'products.id')
            ->select('products.*', 'orderdetail.*', 'orders.id')
            ->where('orders.id', '=', $id)->paginate(5);
        return $items;
    }
}
