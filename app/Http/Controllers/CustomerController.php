<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id')->get();

        return view('customers.index',['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
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
            'status'        => 'Pending', 
            'orderdate'     => now(), 
        ]);
    

        return redirect('/customers')->with('message', 'A new user has been added');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer, Request $request)
    {
        $request->validate([
            'first_Name'    => 'required',
            'last_Name'     => 'required',
            'phone'         => 'required'
        ]);

        $customer->update($request->all());
        return redirect('/customers')->with('message', "$customer->first_Name has been updated");
    }

    public function delete(Customer $customer)
    {
        $customer->delete();

        return redirect('/customers')->with('message', "$customer->first_Name is gone F O R E V E R~");
    }
}
