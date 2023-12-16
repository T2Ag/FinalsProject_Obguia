<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function orders() {
        return $this->hasMany(Order::class);
    }

    public static function list(){
        $customers = Customer::orderByRaw('id')->get();
        $list = [];
        foreach ($customers as $customer) {
            $list[$customer -> id] = $customer->first_Name;
        }

        return $list;
    }
}
