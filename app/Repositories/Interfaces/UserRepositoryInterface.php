<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface UserRepositoryInterface extends RepositoryInterface{
    //function editpass($id);
    public function store($request);
    public function update($request, $id);
    function trash();
    function softdeletes($id);
    function restoredelete($id);
    //function adminpass($id);
    //function adminUpdatePass($request, $id);
    //function updatepass($request);
    //function logout($request);
    //function register($request);

}