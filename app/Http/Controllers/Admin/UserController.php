<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Services\Interfaces\UserServiceInterface;

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
        $users = $this->userService->all($request);
        // $users = User::all();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.users.index', $param);
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
    public function store(Request $request)
    {
        try {
            // $this->userService->store($request);
        $users = $this->userService->store($request);

            // logic after save
        } catch (\Exception $e) {
            //logic handle error
            Log::error($e->getMessage());
        }


        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function update(Request $request, $id)
    {
        try {
            $this->userService->update($request, $id);

            // logic after update
        } catch (\Exception $e) {
            //logic handle error
            Log::error($e->getMessage());

        }
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    public function editpass($id)
    {
        // $this->authorize('view', User::class);
        $user = $this->userService->find($id);
        $param = [
            'user' => $user,
        ];
        return view('admin.users.editpass', $param);
    }

    public function adminpass($id)
    {
        // $this->authorize('adminUpdatePass', User::class);
        $user = $this->userService->find($id);
        $param = [
            'user' => $user,
        ];
        return view('admin.users.adminpass', $param);
    }

    public function adminUpdatePass(Request $request, $id)
    {
        // $this->authorize('adminUpdatePass', User::class);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = [
            'sainhap' => '!',
        ];

        $user = $this->userService->find($id);
        if ($user->group->name != 'Supper Admin') {
            $user->delete();
        } else {
            return dd(__METHOD__);
        }
    }

    //Hiển Thị Đăng Nhập

  public function viewLogin()
  {

      return view('auth.login');
  }
  public function login(Request $request){
    $validated = $request->validate([
        'email' => 'required',
        'password'=>'required|min:6',
    ],
        [
            'email.required'=>'Không được để trống',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);

      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {

          $request->session()->regenerate();

      return view('admin.layout.home');
      }
      // dd($request->all());
      return back()->withErrors([
          'email' => 'Thông tin đăng nhập được cung cấp không khớp với hồ sơ của chúng tôi.',
      ])->onlyInput('email');
  }

  //Hiển Thị Đăng Ký
  public function viewRegister()
  {
      return view('auth.register');
  }

  //xử lí đăng ký
  public function register(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password'=>'required|min:8',
    ],
        [
            'name.required'=>'Không được để trống',
            'email.required'=>'Không được để trống',
            'email.unique'=>'Trùng Email',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      try {
          $user->save();
          return redirect()->route('login');
      } catch (\Exception $e) {
          Log::error("message:".$e->getMessage());
      }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
