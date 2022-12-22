<?php

namespace App\Repositories\Eloquents;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    public function getModel()
    {
        return Customer::class;
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
        // echo __METHOD__;
        // die();
        // dd($this->model);
        $key        = $request->key ?? '';
        $name      = $request->name ?? '';
        $address      = $request->address ?? '';
        $email       = $request->email ?? '';
        $phone       = $request->phone ?? '';
        $id         = $request->id ?? '';
        $query = Customer::query(true);

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($address) {
            $query->where('address', 'LIKE', '%' . $address . '%');
        }
        if ($email) {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }
        if ($phone) {
            $query->where('phone', 'LIKE', '%' . $phone . '%');
        }

        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
            $query->orWhere('address', 'LIKE', '%' . $key . '%');
            $query->orWhere('email', 'LIKE', '%' . $key . '%');
            $query->orWhere('phone', 'LIKE', '%' . $key . '%');
        }

        $products = $query->paginate(3);
        return $products;
        return Customer::orderBy('id', 'DESC')->paginate(1);

    }
}
