<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Customer;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $users = $this->userService->all($request);

        $id         = $request->id ?? '';
        $key        = $request->key ?? '';
        $name      = $request->name ?? '';
        $phone       = $request->phone ?? '';
        $address      = $request->address ?? '';
        $position       = $request->position ?? '';
        $params = [
            'f_id'        => $id,
            'f_key'       => $key,
            'f_name'     => $name,
            'f_phone' => $phone,
            'f_address'     => $address,
            'f_position'     => $position,
            'users'    => $users,
        ];
        return view('admin.users.index', $params);
    }

    public function showAdmin()
    {

        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('admin.users.adminpass', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];

        return view('admin.users.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
        $users = $this->userService->store($request);
        return redirect()->route('user.index')->with('status', 'Thêm nhân viên thành công!');
        } catch (\Exception $e) {
            //logic handle error
            Log::error($e->getMessage());
            return redirect()->route('user.index')->with('status', 'Thêm nhân viên không thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param = [
            'user' => $user,
        ];


        // $productshow-> show();
        return view('admin.users.profile',  $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('view', User::class);
        $user = $this->userService->find($id);
        $groups = Group::get();
        $param = [
            'user' => $user,
            'groups' => $groups
        ];
        return view('admin.users.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->userService->update($request, $id);
            return redirect()->route('user.index')->with('status', 'Cập nhật thành công!');

            // logic after update
        } catch (\Exception $e) {
            //logic handle error
            Log::error($e->getMessage());
            return redirect()->route('user.index')->with('status', 'Cập nhật không thành công!');

        }
    }

    public function editpass($id)
    {
        $this->authorize('view', User::class);
        $user = $this->userService->find($id);
        $param = [
            'user' => $user,
        ];
        return view('admin.users.editpass', $param);
    }

    public function adminpass($id)
    {
        $this->authorize('adminUpdatePass', User::class);
        $user = $this->userService->find($id);
        $param = [
            'user' => $user,
        ];
        return view('admin.users.adminpass', $param);
    }

    public function adminUpdatePass(Request $request, $id)
    {
        $this->authorize('adminUpdatePass', User::class);
        $user = $this->userService->find($id);
        if ($request->renewpassword == $request->newpassword) {
            $item = $this->userService->find($id);
            $item->password = bcrypt($request->newpassword);
            $item->save();
            $notification = [
                'message' => 'Đổi mật khẩu thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);
        } else {
            $notification = [
                'sainhap' => 'Bạn nhập mật khẩu không trùng khớp!',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    public function updatepass(Request $request)
    {
        if ($request->renewpassword == $request->newpassword) {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item = User::find(Auth()->user()->id);
                $item->password = bcrypt($request->newpassword);
                $item->save();
                $notification = [
                    'message' => 'Đổi mật khẩu thành công!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('user.index')->with($notification);
            } else {

                $notification = [
                    'saipass' => '!',

                ];
                return back()->with($notification);
            }
        } else {
            $notification = [
                'sainhap' => '!',
            ];
            return back()->with($notification);
        }
    }
  public function viewLogin()
  {
      return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
          return redirect()->route('home');
      }
      return back()->withErrors([
          'email' => 'Thông tin đăng nhập được cung cấp không khớp với hồ sơ của chúng tôi.',
      ])->onlyInput('email');
  }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function quenmatkhau(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $pass = Str::random(8);
            $user->password = bcrypt($pass);
            $user->save();
            $data = [
                'name' => $user->name,
                'pass' => $pass,
                'email' => $user->email,
            ];
            Mail::send('admin.emails.password', compact('data'), function ($email) use ($user) {
                $email->subject('Shop 3T');
                $email->to($user->email, $user->name);
            });
        }
        return redirect()->route('login');
    }
    public function viewquenmatkhau()
    {
        return view('admin.forgotpassword.forgotpassword');
    }
    public function destroy($id)
    {

        $this->authorize('delete', User::class);
        try {
            $this->userService->destroy($id);
            return redirect()->route('user.index')->with('status','Chuyển vào thùng rác thành công!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('user.index')->with('status','Chuyển vào thùng rác không thành công!');
        }

    }

    public function trash(Request $request)
    {
        $this->authorize('viewtrash', User::class);
        $users = $this->userService->trash($request);
        return view('admin.users.trash', compact('users'));
    }
    public function force_destroy($id)
    {

        $this->authorize('forceDelete', User::class);
        try {
            $user = $this->userService->force_destroy($id);
            return redirect()->route('user.trash')->with('status','Xóa thành công!' );
        } catch (\Exception $e) {
            return redirect()->route('user.trash')->with('error','Xóa không thành công!' );
        }
    }
    public function restore($id)
    {

        $this->authorize('restore',User::class);
        try {
            $this->userService->restore($id);
            return redirect()->route('user.trash')->with('status','Khôi phục thành công!' );
        } catch (\Exception $e) {
            return redirect()->route('user.trash')->with('error','Khôi phục không thành công!' );
        }
    }
}
