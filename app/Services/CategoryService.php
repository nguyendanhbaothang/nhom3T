<?php

namespace App\Services;

use App\Services\Interfaces\CategoryServiceInterface;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){

        return $this->categoryRepository->all($request);
    }
    public function find($id){
        return $this->categoryRepository->find($id);
    }
    public function store($request){
        return $this->categoryRepository->store($request);
    }
    public function update($request, $id){
        return $this->categoryRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->categoryRepository->destroy($id);
    }
    public function getTrashed()
    {
        return $this->categoryRepository->getTrashed();
    }
    public function restore($id)
    {
        return $this->categoryRepository->restore($id);
    }
    public function force_destroy($id)
    {
        return $this->categoryRepository->force_destroy($id);
    }
}

