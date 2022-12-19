<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;



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
        $this->authorize('viewAny', Order::class);
        try {
            $orders = $this->orderService->all($request);
            return view('admin.order.index', compact('orders'));
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }



    public function find($id)
    {
        $this->authorize('view', Order::class);
        try {
            $items = $this->orderService->all($id);
            return view('admin.order.orderdetail', compact('items'));
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }
    public function exportOrder()
    {
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}
