<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Api\Product\ApiProductServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Support\Facades\DB;

class ApiProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)

    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productService->all($request);
        return response()->json($products['getStatusAction']);
    }
    public function product_detail($id)
    {
        $product = Product::with('category')->find($id);
        return response()->json($product, 200);
    }
    public function category_list()
    {
        $categories = Category::with('products')->take(10)->get();
        return response()->json($categories, 200);
    }
    public function search(Request $request)
    {
            $products = $this->FeproductService->search($request);
            return response()->json($products, 200);
    }

    public function trendingProduct()
    {
        $products = DB::table('orderdetail')
        ->leftJoin('products', 'products.id', '=', 'orderdetail.product_id')
        ->selectRaw('products.*, sum(orderdetail.quantity) total_Product, sum(orderdetail.total) total_Price')
        ->groupBy('orderdetail.product_id')
        ->orderBy('total_Product', 'desc')
        ->take(10)
        ->get(); 
        return response()->json($products, 200);

    }
    public function product_new()
    {
        $product = Product::take(10)->get();
        return response()->json($product, 200);
    }

}

