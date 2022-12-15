<?php
namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface ProductRepositoryInterface extends RepositoryInterface{
    function paginate($request);
    function all($request);
}
