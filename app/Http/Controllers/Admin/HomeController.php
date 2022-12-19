<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalProduct = Product::count();
        $totalCategory = Category::count();
        $totalOrder = Order::count();
        $totalUser = User::count();
        return view('admin.layout.home', compact('totalProduct','totalCategory','totalOrder','totalUser'));
    }
}
