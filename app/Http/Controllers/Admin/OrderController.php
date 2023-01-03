<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Interfaces\OrderServiceInterface;
use GuzzleHttp\Psr7\Response;
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

            $orders = $this->orderService->all($request);
            
            return view('admin.order.index', compact('orders'));
    }



    public function find($id)
    {
        $this->authorize('view', Order::class);
        $order = $this->orderService->find($id);
        $order_Details = $order->orderDetails;
        $params = [
            'order' => $order,
            'order_Details' => $order_Details,
        ];
        return view('admin.order.orderdetail',$params);
    }
    public function trangthaidon(Request $request){
        $data = $request->all();
        $trangthai = Order::find($data['order_id']);
        $trangthai->status = $data['trangthai'];
        $trangthai->save();
    }
    public function exportOrder()
    {
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}
