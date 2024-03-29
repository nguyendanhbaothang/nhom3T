<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'orderdetail', 'order_id', 'product_id');
    }
    function orderdetails(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
