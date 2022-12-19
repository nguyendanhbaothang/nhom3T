<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $this->authorize('viewAny', Category::class);
        $categories = $this->categoryService->all($request);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        try {
            $this->categoryService->store($request);
            return redirect()->route('categories.index')->with('status','Thêm sản phẩm thành công!');
        } catch (\Exception) {
            return redirect()->route('categories.index')->with('error','Thêm thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Category::class);
        $item = $this->categoryService->find($id);
        return view('admin.categories.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {

        try {
            $this->categoryService->update($request, $id);
            return redirect()->route('categories.index')->with('status','Sửa  thành công!');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error','Sửa thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Category::class);
        try {
            $this->categoryService->destroy($id);
            return redirect()->route('categories.index')->with('status','Chuyển vào thùng rác thành công!' );
        } catch (\Exception ) {
            return redirect()->route('categories.index')->with('error','Chuyển vào thùng rác thất bại!' );
        }
    }
    public function getTrashed()
    {
        $categories = $this->categoryService->getTrashed();
        return view('admin.categories.trash', compact('categories'));
    }


    public function restore($id)
    {
        $this->authorize('restore',Category::class);
        try {
            $this->categoryService->restore($id);
            return redirect()->route('categories.getTrashed')->with('status','Khôi phục thành công!' );
        } catch (\Exception $e) {
            return redirect()->route('categories.getTrashed')->with('error','Khôi phục không thành công!' );
        }
    }

    public function force_destroy($id)
    {
        $this->authorize('forceDelete', Category::class);
        try {
            $category = $this->categoryService->force_destroy($id);
            return redirect()->route('categories.getTrashed')->with('status','Xóa thành công!' );
        } catch (\Exception $e) {
            return redirect()->route('categories.getTrashed')->with('error','Xóa không thành công!' );
        }
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('categories.index');
        }
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
}
