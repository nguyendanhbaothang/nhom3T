<?php
namespace App\Services\Interfaces;
/*
ServiceInterface nằm cùng cấp, ko cần use
*/
interface UserServiceInterface extends ServiceInterface{
    public function editpass($id);
    public function adminpass($id);
    public function adminUpdatePass($request, $id);
    public function updatepass($request);
    public function login($request);
    public function logout($request);
    public function register($request);
    public function trash($request);
    public function softdeletes($id);
    public function restoredelete($id);

}