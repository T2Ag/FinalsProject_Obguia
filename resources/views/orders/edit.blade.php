@extends('pages.base')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete {{$order->customer->first_Name}}'s Order? Order number {{$order-> id}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('orders/delete/' . $order->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this Order number?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <h1>Update Order</h1>
    <div class="row"> 
        <div class="col-mid-3">
            <form action="{{url('orders/' .$order->id)}}" method="POST">
                @csrf 

                <div class="form-group">
                    <label for="customer_id">Select Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        <option hidden="true">Select Customer</option>
                        <option selected disabled>Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{$customer -> id}}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                              {{$customer -> first_Name}}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="status">Status</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="pendingRadio" value="Pending" {{ $order->status === 'Pending' ? 'checked' : '' }}>
                        <label class="form-check-label" for="pendingRadio">Pending</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="inProgressRadio" value="InProgress" {{ $order->status === 'InProgress' ? 'checked' : '' }}>
                        <label class="form-check-label" for="inProgressRadio">InProgress</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="completedRadio" value="Completed" {{ $order->status === 'Completed' ? 'checked' : '' }}>
                        <label class="form-check-label" for="completedRadio">Completed</label>
                    </div>
                    @error('status')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="orderdate">Order Date</label>
                    <input type="date" name="orderdate" class="form-control" value="{{ date('Y-m-d', strtotime($order->orderdate)) }}">
                    @error('orderdate')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Order
                    </button>
                    <button class="btn btn-dark">
                        Save Order
                    </button>                    
                </div>
 
            </form>
        </div>
    </div>

@endsection