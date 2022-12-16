<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    //
    public function index(Request $request)
    {
        $orders = $this->orderService->all($request);
        return view('admin.order.index', compact('orders'));
    }



    public function find($id)
    {
        $items = $this->orderService->all($id);
        return view('admin.order.orderdetail',compact('items'));
    }

}
