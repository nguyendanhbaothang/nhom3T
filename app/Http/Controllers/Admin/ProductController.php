<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\Interfaces\ProductServiceInterface;
// use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
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
        //

        // $products = $this->productService->all($request);


        // return view('admin.product.index', compact('products'));

        $products =Product::all();
        $categories = Category::all();
        $key        = $request->key ?? '';
        $name      = $request->name ?? '';
        $price      = $request->price ?? '';
        $category_id       = $request->category_id ?? '';

        $id         = $request->id ?? '';
        $query = Product::query(true);

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($price) {
            $query->where('price', 'LIKE', '%' . $price . '%');
        }
        if ($category_id) {
            $query->where('category_id', 'LIKE', '%' . $category_id . '%');

        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
            $query->orWhere('price', 'LIKE', '%' . $key . '%');
            $query->orWhere('category_id', 'LIKE', '%' . $key . '%');
        }

        $products = $query->paginate(5);

       $params = [
            'f_id'        => $id,
            'f_name'     => $name,
            'f_price'     => $price,
            'f_category_id'     => $category_id,
            'f_key'       => $key,
            'f_categories' => $categories,
            'products'    => $products,
        ];
        return view('admin.product.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        $param = [
            'categories' => $categories
        ];
        return view('admin.product.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->productService->store($request);
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = $this->productService->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $param =$this->productService->edit($id);
        return view('admin.product.edit', $param );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->productService->update($request,$id);
        return redirect()->route('product.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->destroy($id);
        // return view('admin.product.trash');
    }
    public function trash(Request $request){
        $products = $this->productService->trash($request);
        $params = [
            'products' => $products
        ];
        return view('admin.product.trash', $params);
    }
    public function softdeletes($id){
        $this->productService->softdeletes($id);
        return redirect()->route('product.index');
    }
    public function restoredelete($id){
        $this->productService->restoredelete($id);
        return redirect()->route('product.trash');
    }
}
