<?php
namespace App\Services\Interfaces;
/*
ServiceInterface nằm cùng cấp, ko cần use
*/
interface CategoryServiceInterface extends ServiceInterface{
    public function getTrashed();
    public function force_destroy($id);
    public function restore($id);
    public function all($request);
}
