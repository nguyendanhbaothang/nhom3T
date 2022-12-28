<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class ApiOrderController extends Controller
{
    function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function create() {
        try{
            $order = Order::all();
            $params = [
                'order' => $order,
            ];
            return response()->json($params);
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try{
            // kiêm tra email có trong bảng customer
            $customer = Customer::where('email','=',$request->email)->first();
            if(!$customer){
                //tao moi customer
                $customer = new Customer();
                $customer->name = $request->name_customer;
                $customer->address =$request->address;
                $customer->phone = $request->phone;
                $customer->email = $request->email;
                $customer->password = bcrypt(123456) ;

                $customer->save();

                $customer_id = $customer->id;
            }else{
                $customer_id = $customer->id;
            }

        $order = new Order;
        $order->customer_id = $customer_id;
        $order->date_at = date('Y-m-d H:i:s');
        $order->total = 0;
        $order->status = 0;
        $order->save();
        $carts = Cache::get('carts');
        $order_total_price = 0;
        foreach ($carts as $productId => $cart) {
            $order_total_price += $cart['price'] * $cart['quantity'];
            OrderDetail::create([
                'quantity' => $cart['quantity'],
                'product_id' => $productId,
                'total' => $cart['price'] * $cart['quantity'],
                'order_id' => $order->id,
            ]);
            Product::where('id', $productId)->decrement('quantity', $cart['quantity']);
        }
        $id_order = $order->id;
        $order->total= $order_total_price;
        $order->save();
        Cache::forget('carts');
        $carts = Cache::get('carts');
        $order = $this->orderService->find($id_order);
        // $customer = Customer::findOrFail($customer_id);
        $orderDetails = $order->orderDetails;
        $orderStatus = 'Bạn Đã Đặt Mua Những Sản Phẩm Sau:';
        $params = [
            'orderStatus' => $orderStatus,
            'order' => $order,
            'orderDetails' => $orderDetails,
        ];



        return response()->json(Order::with(['orderdetails'])->find($order->id));


        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage()
            ]);
        
        }
    }

    public function listorder($id){
        try{
            return response()->json(Customer::with(['orders' => function ($query) {
                return $query->with(['orderdetails'=> function ($query) {
                    return $query->with(['products']);
                }]);
            }])->find($id));
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }
    public function show($id) {
        try{
            return response()->json(Order::with(['orderDetails' => function ($query) {
                return $query->with(['products']);
            }])->find($id));
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
        }
}
