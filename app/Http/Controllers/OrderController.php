<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    //api for Vue
    public function getAll()
    {
        $orders = Order::with('customer')->OrderBy('id')->get();

        return response()->json($orders);
    }

    public function getOne(Order $order)
    {
        return response()->json($order);
    }

    public function storeOrder(Request $request) {
        $fields = $request->validate([
            'customer_id'   =>  'required|numeric',
            'status'        =>  'required|in:Pending,InProgress,Completed',
        ]);

        $order = Order::create([
            'customer_id'   => $request->customer_id,
            'status'        => $request->status,
            'orderdate'     => now(), 
        ]);

        return response()->json([
            'status' => "OK",
            'message' => 'Customer with ID# ' .$order->id . ' has been created'
        ]);
    }

    public function updateVue(Order $order, Request $request)
    {
        $fields = $request->validate([
            'customer_id'   =>  'required|numeric',
            'status'        =>  'required|in:Pending,InProgress,Completed',

        ]);

        $order->update($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Order with ID# ' .$order->id . ' has been updated'
        ]);
    }

    public function destroy(Order $order)
    {   
        $details = $order->id;
        $order->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Order with the ID ' .$details . ' has been deleted'
        ]);
    }

}
