<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
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
    public function index(Request $request)
    {
        $this->authorize('viewAny',Group::class);
        $groups = $this->groupService->paginate($request);
        return view('admin.group.index',compact('groups'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Group::class);
        return view('admin.group.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        try {
            $this->groupService->store($request);
            return redirect()->route('group.index')->with('status','Thêm thành công!');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            return redirect()->route('group.index')->with('error','Thêm thất bại!');
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
        $this->authorize('update',Group::class);
        $group = $this->groupService->find($id);
        return view('admin.group.edit', compact('group'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        try {
            $this->groupService->update( $request, $id);
            return redirect()->route('group.index')->with('status','Cập nhật thành công!');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('group.index')->with('status','Cập nhật không thành công!');
        }

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
        $this->authorize('delete', Group::class);
        try {
            $this->groupService->destroy($id);
            return redirect()->route('group.index')->with('status','Xóa thành công!');

        }catch (\Exception $e) {
            Log::error('message:' . $e->getMessage());
            return redirect()->route('group.index')->with('status','Xóa không thành công!');
        }

    }
    public function forceDelete($id)
    {
        $this->authorize('forceDelete', Group::class);
        try {
            $this->groupService->forceDelete($id);
            return redirect()->route('group.garbage')->with('status','Xóa thành công!');
        } catch (\Exception $e) {
            Log::error('message:' . $e->getMessage());
            return redirect()->route('group.garbage')->with('status','Xóa không thành công!');
        }
    }
    public function restore($id)
    {
        $this->authorize('restore', Group::class);
        try {
            $this->groupService->restore($id);
            return redirect()->route('group.garbage')->with('status','Khôi phục thành công!');
        } catch (\Exception $e) {
            Log::error('message:' . $e->getMessage());
            return redirect()->route('group.garbage')->with('status','Khôi phục không thành công!');
        }
    }
    public function Garbage()
    {
        $groups = $this->groupService->Garbage();
        return view('admin.layout.trash');
    }

    public function group_detail(Request $request, $id)
    {
        $this->groupService->group_detail($id, $request);
        return redirect()->route('group.index')->with('status','Cấp quyền thành công!');
    }
    public function detail($id)
    {

        $group =  $this->groupService->detail($id);
        return view('admin.group.detail', $group);
    }

}
