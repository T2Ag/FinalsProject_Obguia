<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getAll()
    {
        $customers = Customer::orderBy('id')->get();

        return response()->json($customers);
    }

    public function getOne(Customer $customer)
    {
        $customer->load('orders');

        return response()->json($customer);
    }

    public function storeCustomer(Request $request) {
        $fields = $request->validate([
            'first_Name'    => 'required',
            'last_Name'     => 'required',
            'phone'         => 'required'
        ]);

        $customer = Customer::create([
            'first_Name'    => $request->first_Name,
            'last_Name'     => $request->last_Name,
            'phone'         => $request->phone,
        ]);

        Order::create([
            'customer_id'   => $customer->id, 
            'status'        => 'InProgress', 
            'orderdate'     => now(), 
        ]);

        return response()->json([
            'status' => "OK",
            'message' => 'Customer with ID# ' .$customer->id . ' has been created'
        ]);
    }

    public function updateVue(Customer $customer, Request $request)
    {
        $fields = $request->validate([
            'first_Name'    => 'required',
            'last_Name'     => 'required',
            'phone'         => 'required'
        ]);

        $customer->update($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Customer with ID# ' .$customer->id . ' has been updated'
        ]);
    }

    public function destroy(Customer $customer)
    {   
        $details = $customer->first_Name;
        $customer->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Customer with the name ' .$details . ' has been deleted'
        ]);
    }


    
}
