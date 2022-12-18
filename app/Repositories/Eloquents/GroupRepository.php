<?php
namespace App\Repositories\Eloquents;

use App\Models\Group;
use Illuminate\Support\Facades\Log;

use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class GroupRepository extends EloquentRepository implements GroupRepositoryInterface
{
    public function getModel()
    {
        return Group::class;
    }

    public function all($request)
    {
        $group = $this->model->select('*');
        if (!empty($request->search)) {
            $search = $request->search;
            $group = $group->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%');

        }
        return $group->orderBy('id', 'DESC')->paginate(3);

    }
    public function update($id, $data)
    {
        $group = $this->find($id);
        $group->roles()->sync($data);
    }
}