<?php

namespace App\Services;

// use App\Services\Interfaces\UserServiceInterface;
// use App\Services\Interfaces\GroupServiceInterface;


use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Services\Interfaces\GroupServiceInterface;

class GroupService implements GroupServiceInterface
{
    protected $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function paginate($request){
       
        return $this->groupRepository->paginate($request);
    }

    public function all($request){

        return $this->groupRepository->all($request);
    }
    //lay chi tiet
    public function find($id){
        return $this->groupRepository->find($id);
    }
    public function store($request){
        return $this->groupRepository->store($request);
    }
    // public function edit($id){
    //     return $this->groupRepository->edit($id);
    // }
    public function update($request, $id){
        return $this->groupRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->groupRepository->destroy($id);
    }
    public function detail($id){
        return $this->groupRepository->detail($id);

    }
    public function group_detail($request, $id){
        return $this->groupRepository->group_detail($request,$id);

    }
}