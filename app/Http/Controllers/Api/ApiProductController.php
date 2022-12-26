<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Api\Product\ApiProductServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;

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
        return response()->json($products);
    }
    public function product_detail($id)
    {
        $product = $this->productService->find($id);
        return response()->json($product, 200);
    }
    public function category_list()
    {
        $categories = Category::with('products')->take(10)->get();
        return response()->json($categories, 200);
    }

}
