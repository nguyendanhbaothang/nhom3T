<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface CategoryRepositoryInterface extends RepositoryInterface{
    function paginate($request);
    function all($request);
    function store($request);
    function update($request,$id);
    function getTrashed();
    function restore($id);
    function force_destroy($id);
}

