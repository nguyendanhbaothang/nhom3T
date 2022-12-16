<?php
namespace App\Services\Interfaces;
/*
ServiceInterface nằm cùng cấp, ko cần use
*/
interface UserServiceInterface extends ServiceInterface{
    public function showAdmin();
    public function editpass($id);
    public function adminpass($id);
    public function adminUpdatePass($request, $id);
    public function updatepass($request);
    public function viewLogin();
    public function viewRegister();
    public function logout($request);
    public function register($request);

}