<?php
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;

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
    public function paginate($request){
        $result = $this->model->paginate();
        return $result;
    }

    public function all($request){
        return Product::orderBy('id', 'DESC')->get();

    }
    public function store($request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
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

    public function update($request,$id){
    $product = Product::find($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->description = $request->description;
    $product->category_id = $request->category_id;
    $product->status = $request->status;
    $get_image=$request->image;
    if($get_image){
        $path='public/uploads/product/'.$product->image;
        if(file_exists($path)){
            unlink($path);
        }
    $path='public/uploads/product/';
    $get_name_image=$get_image->getClientOriginalName();
    $name_image=current(explode('.',$get_name_image));
    $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    $get_image->move($path,$new_image);
    $product->image=$new_image;

    $data['product_image']=$new_image;
    }

    return $product->save();
}
public function destroy($id)
    {
        $products=Product::onlyTrashed()->findOrFail($id);
        return $products->forceDelete();

    }
    public function trash()
    {
        return Product::onlyTrashed()->get();
    }

    public function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        return $product->save();

    }
    public function restoredelete($id)
    {
        $product=Product::withTrashed()->where('id', $id);
        return $product->restore();
    }


}
