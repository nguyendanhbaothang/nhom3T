<?php

namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;


class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    /*
    - Do PostRepository đã kế thừa EloquentRepository nên không cần triển khai
    các phương thức trừu tượng của PostRepositoryInterface
    - Có thể ghi đè phương thức ở đây
    - Nếu muốn thêm phương thức mới cần:
        + Khai báo thêm ở PostRepositoryInterface
        + Triển khai lại ở đây
    - Ví dụ: paginate() không có sẵn trong RepositoryInterface, để thêm chúng ta thêm:
        + Khai báo paginate() ở PostRepositoryInterface
        + Triển khai lại ở PostRepository
    */
    public function paginate($request)
    {
        $result = $this->model->paginate();
        return $result;
    }

    public function all($request)
    {
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

        $products = $query->with('category')->orderBy('id', 'DESC')->paginate(6);
        $getStatusAction = Product::with('category')->where('status', 0)->paginate(6);
        $param = [
            'products' => $products,
            'getStatusAction' => $getStatusAction
        ];

        return $param;
    }

    public function store($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->product_hot = $request->product_hot;
        $product->status = $request->status;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/assets/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        return  $product->save();
    }

    public function update($request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->product_hot = $request->product_hot;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'public/assets/product/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/assets/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;

            $data['product_image'] = $new_image;
        }

        return $product->save();
    }

    public function trashedItems()
    {
        return Product::onlyTrashed()->get();
    }

    public function destroy($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        return $product->save();
    }
    public function restoredelete($id)
    {
        $product = $this->model->withTrashed()->findOrFail($id);
        return  $product->restore();
    }

    public function force_destroy($id)
    {
        $products = $this->model->onlyTrashed()->findOrFail($id);
        return $products->forceDelete();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        $param = [
            'product' => $product,
            'categories' => $categories
        ];
        return $param;
    }
    public function search($request)
    {
        $query = $this->model::query();
        $data = $request->input('search');
        if ($data) {
            $query->whereRaw("name Like '%" . $data . "%' ")
                ->orWhereRaw("price Like '%" .$data . "%' ")
                ->orWhereRaw("description Like '%" .$data . "%' ")
            ;
        }
        return $query->get();
    }
}
