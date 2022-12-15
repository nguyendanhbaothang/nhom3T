<?php
namespace App\Repositories\Eloquents;

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
    public function paginate($request){
        $result = $this->model->paginate();
        return $result;
    }

    public function all($request){
        // echo __METHOD__;
        // die();
        // dd($this->model);
        return Product::orderBy('id', 'DESC')->get();

    }

}
