<?php

namespace App\Services;

// use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\GroupServiceInterface;


use App\Repositories\Interfaces\GroupRepositoryInterface;

class GroupService implements GroupServiceInterface
{
    protected $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){

        return $this->groupRepository->all($request);
    }
    public function find($id){
        return $this->groupRepository->find($id);
    }
    public function store($request){
        return $this->groupRepository->store($request);
    }
    public function update($request, $id){
        return $this->groupRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->groupRepository->destroy($id);
    }
}