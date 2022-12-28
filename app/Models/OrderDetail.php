<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';
    protected $fillable = ['quantity','product_id','total','order_id'];

    function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    function orders(){
        return $this->belongsTo(Order::class);
    }
}
