<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderdetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public static function list(){
        $menuitems = MenuItem::orderByRaw('id')->get();
        $list = [];
        foreach ($menuitems as $menuitem) {
            $list[$menuitem -> id] = $menuitem->item_name;
        }

        return $list;
    }
}
