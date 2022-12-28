<?php
namespace App\Services\Interfaces;
/*
ServiceInterface nằm cùng cấp, ko cần use
*/
interface ProductServiceInterface extends ServiceInterface{
    public function trashedItems($request);
    public function search($request);
    public function force_destroy($id);
    public function restoredelete($id);
    public function edit($id);
}
