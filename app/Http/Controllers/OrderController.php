<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id')->get();

        return view('orders.index',['orders' => $orders]);
    }

    public function create()
    {
        $customers = Customer::list();
        return view('orders.create', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'   =>  'required|numeric',
            'status'        =>  'required|in:Pending,InProgress,Completed'
        ]);

        Order::create([
            'customer_id'   => $request->customer_id,
            'status'        => $request->status,
            'orderdate'     => now(),
        ]);

        return redirect('/orders')->with('message', 'A new Order has been added');
    }

    public function edit(Order $order)
    {
        
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Order $order, Request $request)
    {
        $request->validate([
            'customer_id'   =>  'required|numeric',
            'status'        =>  'required|in:Pending,InProgress,Completed',
            'orderdate'     =>  'required|date'
        ]);

        $order->update($request->all());

        return redirect('/orders')->with('message', 'A new Order has been updated');
    }

    public function delete(Order $order)
    {
        $name = $order->customer->first_Name;
        $order->delete();

        return redirect('/orders')->with('message', "$name's order is gone F O R E V E R~");
    }
}
