<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function orderdetails() {
        return $this->hasMany(OrderDetail::class);
    }

    
    public static function list(){
        $orders = Order::orderByRaw('id')->get();
        $list = [];
        foreach ($orders as $order) {
            $list[$order -> id] = $order->customer->first_Name ;
        }

        return $list;
    }
}
