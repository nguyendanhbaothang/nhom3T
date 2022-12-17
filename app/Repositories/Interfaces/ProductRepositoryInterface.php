<?php

namespace App\Repositories\Interfaces;
//RepositoryInterface cùng cấp, ko cần use
interface ProductRepositoryInterface extends RepositoryInterface
{
    function paginate($request);
    function destroy($id);
    function trash();
    function softdeletes($id);
    function restoredelete($id);
    function edit($id);
}
