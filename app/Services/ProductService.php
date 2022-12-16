<?php

namespace App\Services;

use App\Services\Interfaces\ProductServiceInterface;

use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){

        return $this->productRepository->all($request);
    }
    public function find($id){
        return $this->productRepository->find($id);
    }
    public function store($request){
        return $this->productRepository->store($request);
    }
    public function update($request, $id){
        return $this->productRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->productRepository->destroy($id);
    }
    public function trash($request)
    {
        return $this->productRepository->trash($request);
    }
    public function softdeletes($id){
        return $this->productRepository->softdeletes($id);
    }
    public function restoredelete($id){
        return $this->productRepository->restoredelete($id);
    }
    public function edit($id){
        return $this->productRepository->edit($id);
    }

}
