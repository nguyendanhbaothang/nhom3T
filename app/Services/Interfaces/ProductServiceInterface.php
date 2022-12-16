<?php
namespace App\Services\Interfaces;
/*
ServiceInterface nằm cùng cấp, ko cần use
*/
interface ProductServiceInterface extends ServiceInterface{
    public function trash($request);
    public function softdeletes($id);
    public function restoredelete($id);
    public function edit($id);
}
