<?php

namespace App\Repositories\Eloquents;

use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
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

    public function store($request)
    {

        $user = new $this->model;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'assets/images/user/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->image = $new_image;
            $data['user_image'] = $new_image;
        }

        $user->save();

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        Mail::send('admin.emails.user', compact('data'), function ($email) use($user) {
            $email->subject('3T Shop');
            $email->to($user->email, $user->name);
        });
        return true;

    return $user;
    }

    public function update($request, $id){
        // echo __METHOD__;die();
        $user = $this->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'assets/images/user/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->image = $new_image;
            $data['user_image'] = $new_image;
        }
        $user->save();
    }
    // public function destroy($id)
    // {

    // }
    // public function trash($request)
    // {
    //     return User::onlyTrashed()->get();
    // }
    // public function restore($id)
    // {
    //     $user = $this->model->withTrashed()->findOrFail($id);
    //     try {
    //         $user->restore();
    //         return true;
    //     } catch (\Exception $e) {
    //         Log::error($e->getMessage());
    //         return false;
    //     }
    //     return $user;
    // }
    // public function force_destroy($id)
    // {
    //     $user = $this->model->onlyTrashed()->findOrFail($id);
    //     $user->forceDelete();
    //     return $user;
    // }
    public function destroy($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        return $user->forceDelete();
    }
    public function trash()
    {
        return User::onlyTrashed()->get();
    }

    public function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user = User::findOrFail($id);
        $user->deleted_at = date("Y-m-d h:i:s");
        return $user->save();
    }
    public function restoredelete($id)
    {
        $user = User::withTrashed()->where('id', $id);
        return $user->restore();
    }
}

