@extends('pages.base')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete {{$orderdetail->order->customer->first_Name}}'s {{$orderdetail->menuitem->item_name}} Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('orderdetails/delete/' . $orderdetail->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this Order?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <h1>Create New Order</h1>
    <div class="row"> 
        <div class="col-mid-3">
            <form action="{{url('orderdetails/' .$orderdetail->id)}}" method="POST">
                @csrf 

                <div class="form-group">
                    <label for="order_id">Select Order</label>
                    <select name="order_id" id="order_id" class="form-select">
                        <option hidden="true">Select Order</option>
                        <option selected disabled>Select Order</option>
                        @foreach($orders as $order)
                            <option value="{{$order->id}}" {{ $order->id == $orderdetail->order_id ? 'selected' : '' }}>
                              {{$order->id}} - {{$order->customer->first_Name}}</option>
                        @endforeach
                    </select>
                    @error('order_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="menuitem_id">Select Item</label>
                    <select name="menuitem_id" id="menuitem_id" class="form-select">
                        <option hidden="true">Select Item</option>
                        <option selected disabled>Select Item</option>
                        @foreach($menuitems as $menuitem)
                            <option value="{{$menuitem->id}}" {{ $menuitem->id == $orderdetail->menuitem_id ? 'selected' : '' }}>
                              {{$menuitem->id}} - {{$menuitem->item_name}}</option>
                        @endforeach
                    </select>
                    @error('menuitem_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{$orderdetail->quantity}}">
                    @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Order Detail
                    </button>
                    <button class="btn btn-dark">
                      Save Order Detail
                    </button>                    
                </div>
 
            </form>
        </div>
    </div>

@endsection