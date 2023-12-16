@extends('pages.base')

@section('content')
@if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 buttondiv">
    <a href="{{ url('orderdetails/create')}}" class="btn btn-dark me-md-2" type="button">Add an Order Detail</a>
</div>


<table class="table table-bordered table-striped table-sm">
    
    <thead>
        <th>ID</th>
        <th>Order Number</th>
        <th>Customer Name</th>
        <th>Menu Item</th>
        <th>Quantity</th>
        <th>Total</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($orderdetails as $orderdetail)
            <tr>
              <td>{{ $orderdetail->id }}</td>
              <td>{{ $orderdetail->order->id }}</td>
              <td>{{ $orderdetail->order->customer->first_Name}} {{ $orderdetail->order->customer->last_Name}}</td>
              <td>{{ $orderdetail->menuitem->item_name}}</td>
              <td>{{ $orderdetail->quantity }}</td>
              <td>{{ $orderdetail->totalprice}}</td>
              <td class="text-center">
                    <a href="{{url('orderdetails/'.$orderdetail->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection

<style>
    .buttondiv a {
        background-color: black;
        color: white;
        border: 1px solid transparent;
    }

    .buttondiv a:hover {
        background-color: white;
        color: black;
        border-color: black;
    }

</style>