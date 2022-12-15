<?php
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
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
        return Category::orderBy('id', 'DESC')->get();

    }
    public function find($id){
        $category = Category::find($id);
        return $category;

    }
    public function store($request){
        $category = new Category();
            $category->name = $request->name;
            return $category->save();

    }
    public function update($request,$id){
        $category = new Category();
        $category = Category::find($id);
        $category->name = $request->name;
            return $category->save();

    }
    public function getTrashed(){
        $query = $this->model->onlyTrashed();
        $query->orderBy('id', 'desc');
        $category = $query->paginate(5);
        return $category;
    }
    public function restore($id){
        $category = $this->model->withTrashed()->findOrFail($id);
        $category->restore();
        return $category;
    }
    public function force_destroy($id){
        $category = $this->model->onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return $category;
    }
}
