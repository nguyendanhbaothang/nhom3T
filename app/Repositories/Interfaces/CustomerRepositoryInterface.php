<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface CustomerRepositoryInterface extends RepositoryInterface{
    function paginate($request);
    function create($data);


}
