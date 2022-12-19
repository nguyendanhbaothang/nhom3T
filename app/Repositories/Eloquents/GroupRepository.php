<?php
namespace App\Repositories\Eloquents;

use App\Models\Group;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\Auth;

class GroupRepository extends EloquentRepository implements GroupRepositoryInterface
{
    public function getModel()
    {
        return Group::class;
    }
    public function paginate($request)
    {
        $result = $this->model->paginate(3);
        return $result;
    }

    public function all($request)
    {
        $groups =  $this->model->orderBy('id', 'DESC')->get();
        return $groups;
    }
    public function find($id)
    {
        $group = $this->model->find($id);
        return $group;
    }
    public function store($request)
    {
        $group = new $this->model;
        $group->name = $request->name;
        return $group->save();
    }
    public function update($request, $id)
    {
        // $group = new $this->model;
        $group = $this->model->find($id);
        $group->name = $request->name;
        return $group->save();
    }
    public function create($request)
    {
        $group = new $this->model();
        $group->name = $request->name;
        return $group->save();
    }
    public function restore($id)
    {
        $group = $this->model->withTrashed()->findOrFail($id);
        $group->restore();
        return $group;
    }
    public function Garbage()
    {
        $group = $this->model->onlyTrashed();
        $group->orderBy('id', 'desc');
        return $group;
    }
    public function forceDelete($id)
    {
        $group = $this->model->onlyTrashed()->findOrFail($id);
        $group->forceDelete();
        return $group;
    }
    public function detail($id)
    {
        $group = Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
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
        return $params;
    }
    public function group_detail($id, $request)
    {
        $group = Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        return true;
    }
   
}