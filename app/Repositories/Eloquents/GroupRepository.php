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
}