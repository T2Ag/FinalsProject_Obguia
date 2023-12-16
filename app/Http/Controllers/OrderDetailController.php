<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderdetails = OrderDetail::orderBy('id')->get();

        return view('orderdetails.index',['orderdetails' => $orderdetails]);
    }

    public function create()
    {
        $orders = Order::list(); 
        $menuitems = MenuItem::list(); 

        return view('orderdetails.create', [
            'orders' => $orders,
            'menuitems' => $menuitems
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id'      =>  'required|numeric',
            'menuitem_id'   =>  'required|numeric',
            'quantity'      =>  'required|numeric',
        ]);

        $menuItem = MenuItem::find($request->menuitem_id);

        if (!$menuItem) {
            return redirect('/orderdetails')->with('error', 'Menu Item not found');
        }

        $totalprice = $menuItem->price * $request->quantity;

        OrderDetail::create([
            'order_id'      => $request->order_id,
            'menuitem_id'   => $request->menuitem_id,
            'quantity'      => $request->quantity,
            'totalprice'    => $totalprice
        ]);

        return redirect('/orderdetails')->with('message', 'A new Order has been added');
    }

    public function edit(OrderDetail $orderdetail)
    {
        $orders = Order::all(); 
        $menuitems = MenuItem::all(); 

        return view('orderdetails.edit', compact('orderdetail', 'orders', 'menuitems'));
    }

    public function update(OrderDetail $orderdetail, Request $request)
    {
        $request->validate([
            'order_id'      =>  'required|numeric',
            'menuitem_id'   =>  'required|numeric',
            'quantity'      =>  'required|numeric',
        ]);

        $menuItem = MenuItem::find($request->menuitem_id);

        if (!$menuItem) {
            return redirect('/orderdetails')->with('error', 'Menu Item not found');
        }

        $totalprice = $menuItem->price * $request->quantity;

        $orderdetail -> update([
            'order_id'      => $request->order_id,
            'menuitem_id'   => $request->menuitem_id,
            'quantity'      => $request->quantity,
            'totalprice'    => $totalprice
        ]);

        return redirect('/orderdetails')->with('message', 'A new Order has been updated');
    }

    public function delete(OrderDetail $orderdetail)
    {
        $name = $orderdetail->order->customer->first_Name;
        $orderdetail->delete();

        return redirect('/orderdetails')->with('message', "$name's order is gone F O R E V E R~");
    }

}
