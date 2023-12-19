<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //api for vue
    public function getAll()
    {
        $orderdetails = OrderDetail::with('order.customer', 'menuitem')->OrderBy('id')->get();

        return response()->json($orderdetails);
    }

    public function storeOrderDetail(Request $request)
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

        $orderdetail = OrderDetail::create([
            'order_id'      => $request->order_id,
            'menuitem_id'   => $request->menuitem_id,
            'quantity'      => $request->quantity,
            'totalprice'    => $totalprice
        ]);

        return response()->json([
            'status' => "OK",
            'message' => 'Menu with ID# ' .$orderdetail->id . ' has been created'
        ]);
    }

    public function updateVue(OrderDetail $orderdetail, Request $request)
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

        return response()->json([
            'status' => "OK",
            'message' => 'Menu with ID# ' .$orderdetail->id . ' has been created'
        ]);
    }

    public function destroy(OrderDetail $orderdetail)
    {   
        $details = $orderdetail->id;
        $orderdetail->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Order with the ID ' .$details . ' has been deleted'
        ]);
    }

}
