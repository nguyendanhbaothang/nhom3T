<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface GroupRepositoryInterface extends RepositoryInterface{
    function paginate($request);

    // public function softDeletes($id);
    // public function restore($id);
    // public function Garbage();
    // public function deletes($id);
    // public function force_destroy($id);

    public function detail($id);
    public function group_detail($id, $request);

}