<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface ProductRepositoryInterface extends RepositoryInterface{
    function paginate($request);
    function all($request);
    function store($request);
    function update($request, $id);
    public function destroy($id);
    public function trash();
    public function softdeletes($id);
    public function restoredelete($id);

}
