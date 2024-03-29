<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;


use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){

        return $this->userRepository->all($request);
    }
    public function find($id){
        return $this->userRepository->find($id);
    }
    public function store($request){
        return $this->userRepository->store($request);
    }
    public function update($request, $id){
        return $this->userRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->userRepository->destroy($id);
    }
    public function editpass($id){
        return $this->userRepository->editpass($id);

    }
    public function adminpass($id){
        return $this->userRepository->adminpass($id);

    }
    public function adminUpdatePass($request, $id){
        return $this->userRepository->adminUpdatePass($request, $id);
    }
    public function updatepass($request){
        return $this->userRepository->updatepass($request);
    }
    public function login($request){
        return $this->userRepository->login($request);
    }
    public function logout($request){
        return $this->userRepository->logout($request);
    }
    public function register($request){
        return $this->userRepository->register($request);
    }
    public function trash($request)
    {
        return $this->userRepository->trash($request);
    }
    public function force_destroy($id)
    {
        return $this->userRepository->force_destroy($id);
    }
    public function restore($id){
        return $this->userRepository->restore($id);
    }

}
