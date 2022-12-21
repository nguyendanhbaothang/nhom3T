<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Group;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productnew = Product::take(4)->get();
        $totalProduct = Product::count();
        $categorynew = Category::take(4)->get();

        $totalCategory = Category::count();
        $totalOrder = Order::count();
        $totalUser = User::count();
        $totalCustomer = Customer::count();
        $totalGroup = Group::count();
        return view('admin.layout.home', compact('categorynew','totalProduct','totalCategory','totalOrder','totalUser','totalCustomer','totalGroup','productnew'));
    }
}
