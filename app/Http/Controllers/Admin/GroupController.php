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
    public function index(Request $request)
    {
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
            $notification = [
                'addgroup' => 'Thêm Tên Quyền Thành Công!',
            ];
            return redirect()->route('group.index')->with($notification);
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.index')->with($notification);
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
    public function update(Request $request, $id)
    {
        try {
            $this->groupService->update( $id, $request);
            $notification = [
                'message' => 'Câp Nhật Thành Công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.index')->with($notification);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.index')->with($notification);
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
        // $this->authorize('delete', Group::class);
        try {
            $this->groupService->destroy($id);
            $notification = [
                'message' => 'Đã chuyển vào thùng rác!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.index')->with($notification);
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.index')->with($notification);
        }
        
    }
    public function forceDelete($id)
    {
        // $this->authorize('forceDelete', Group::class);
        try {
            $this->groupService->forceDelete($id);
            $notification = [
                'message' => 'Nhóm quyền đã bị xóa!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.garbage')->with($notification);
        } catch (\Exception $e) {
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.garbage')->with($notification);
        }
    }
    public function restore($id)
    {
        try {
            // $this->authorize('restore', Group::class);
            $this->groupService->restore($id);
            $notification = [
                'message' => 'Khôi phục thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.garbage')->with($notification);
        } catch (\Exception $e) {
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.garbage')->with($notification);
        }
    }
    public function Garbage()
    {
        $groups = $this->groupService->Garbage();
        return view('admin.layout.trash');
    }

    public function group_detail(Request $request, $id)
    {
        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $this->groupService->group_detail($id, $request);
        return redirect()->route('group.index')->with($notification);
    }
    public function detail($id)
    {

        $group =  $this->groupService->detail($id);
        return view('admin.group.detail', $group);
    }
    
}
