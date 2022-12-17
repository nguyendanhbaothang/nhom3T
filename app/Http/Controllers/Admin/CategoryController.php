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

          $this->categoryService->store($request );
          return redirect()->route('categories.index');

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
        //
        $item = $this->categoryService->find($id);
        return view('admin.categories.edit',compact('item'));
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
        $this->categoryService->update($request ,$id);
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->destroy($id);
        return redirect()->route('categories.index');
    }
    public function getTrashed(){
        $categories = $this->categoryService->getTrashed();
        return view('admin.categories.trash',compact('categories'));
    }
    public function restore($id){
        $this->categoryService->restore($id);
        return redirect()->route('categories.getTrashed');
    }
    public function force_destroy($id){

            $category = $this->categoryService->force_destroy( $id);
            return redirect()->route('categories.getTrashed');

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
