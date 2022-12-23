<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\User;
use App\Services\Interfaces\ProductServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
        $this->authorize('viewAny', Product::class);
        $products = $this->productService->all($request);
        $categories = Category::all();
        $key        = $request->key ?? '';
        $name      = $request->name ?? '';
        $price      = $request->price ?? '';
        $category_id       = $request->category_id ?? '';
        $id         = $request->id ?? '';
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
        $this->authorize('create', Product::class);
        $categories = Category::get();
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
    public function store(StoreProductRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            $this->productService->store($request);
            DB::commit();
            return redirect()->route('product.index')->with('status', 'Thêm sản phẩm thành công!');
        } catch (Exception) {
            DB::rollBack();
            return redirect()->route('product.index')->with('error', 'Thêm thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Product::class);
        $product = $this->productService->find($id);
        $users = User::all();
        return view('admin.product.detail', compact('product', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->authorize('update', Product::class);
        $param = $this->productService->edit($id);
        return view('admin.product.edit', $param);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->productService->update($request, $id);
            DB::commit();
            return redirect()->route('product.index')->with('status', 'Sửa  thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('product.index')->with('error', 'Sửa thất bại!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         $this->authorize('delete', Product::class);
         $this->productService->destroy($id);
         return redirect()->route('product.index')->with('status', 'Chuyển vào thùng rác thành công!');
     }
    public function force_destroy($id)
    {
        $this->authorize('forceDelete', Product::class);

        try {
            $product = $this->productService->force_destroy($id);;
            return redirect()->route('product.trash')->with('status','Xóa thành công!' );
        } catch (\Exception $e) {
            return redirect()->route('product.trash')->with('error','Xóa không thành công!' );
        }
    }

    public function trashedItems(Request $request)
    {
        $this->authorize('viewtrash', Product::class);
        $products = $this->productService->trashedItems($request);
        $params = [
            'products' => $products
        ];
        return view('admin.product.trash', $params);
    }

    public function restoredelete($id)
    {
        $this->authorize('restore',Product::class);
    try {
        $this->productService->restoredelete($id);
        return redirect()->route('product.trash')->with('status','Khôi phục thành công!' );
    } catch (\Exception $e) {
        return redirect()->route('product.trash')->with('error','Khôi phục không thành công!' );
    }
}
    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
