@extends('pages.base')

@section('content')
    <h1>Create New Order Detail</h1>
    <div class="row"> 
        <div class="col-mid-3">
            <form action="{{url('orderdetails/create')}}" method="POST">
                @csrf 

                <div class="form-group">
                    <label for="order_id">Select Order</label>
                    <select name="order_id" id="order_id" class="form-select">
                        <option hidden="true">Select Order</option>
                        <option selected disabled>Select Order</option>
                        @foreach($orders as $orderID => $order)
                            <option value="{{$orderID}}">{{$orderID}} - {{$order}}</option>
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
                        @foreach($menuitems as $menuitemID => $menuitem)
                            <option value="{{$menuitemID}}">{{$menuitemID}} - {{$menuitem}}</option>
                        @endforeach
                    </select>
                    @error('menuitem_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                    @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-dark">
                            Add User
                    </button>                    
                </div>
 
            </form>
        </div>
    </div>

@endsection