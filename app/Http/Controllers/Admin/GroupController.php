<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use App\Services\Interfaces\GroupServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;



class GroupController extends Controller
{
    protected $groupService;

    public function __construct(GroupServiceInterface $groupService)
    {
        $this->groupService = $groupService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        
        
        $group = $this->groupService->all($request);
        $users= User::get();
        $param = [
            'group' => $group,
            'users' => $users,
        ];
        return view('admin.group.index',compact($param) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Group::class);
        return view('admin.group.add');
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
            $this->groupService->store($request->all());
            Session::flash('success', config('define.store.succes'));
            return redirect()->route('group.index');
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:'. $e->getMessage());
            return redirect()->route('group.index');
        }
        $notification = [
            'addgroup' => 'Thêm Tên Quyền Thành Công!',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Group::find($id);
        // $this->authorize('update', Group::class);
        $current_user = Auth::user();
        $userRoles = $user->roles->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'user' => $user,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.group.edit',$params);
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
            $item = $this->groupService->update( $id, $request->roles);
            Session::flash('success', config('define.update.succes'));
            return redirect()->route('group.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', config('define.update.error'));
            return redirect()->route('group.index');
        }
        $notification = [
            'message' => 'Câp Nhật Thành Công!',
            'alert-type' => 'success'
        ];
        // return redirect()->route('group.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->authorize('delete', Group::class);
        try {
            $user = $this->groupService->destroy($id);
            Session::flash('success', config('define.recycle.succes'));
            return redirect()->route('group.index');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.recycle.error'));
            return redirect()->route('group.index');
        }
        $notification = [
            'message' => 'Xoá Thành Công!',
            'alert-type' => 'success'
        ];
    }

    public function detail($id)
    {
        $group=Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.group.detail',$params);
    }

    public function group_detail(Request $request,$id)
    {
        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $group= Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        return redirect()->route('group.index')->with($notification);;
    }
}
