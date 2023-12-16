@extends('pages.base')

@section('content')
    <h1>Create New Order</h1>
    <div class="row"> 
        <div class="col-mid-3">
            <form action="{{url('orders/create')}}" method="POST">
                @csrf 

                <div class="form-group">
                    <label for="customer_id">Select Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        <option hidden="true">Select Customer</option>
                        <option selected disabled>Select Customer</option>
                        @foreach($customers as $customerID => $customer)
                            <option value="{{$customerID}}">{{$customer}}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="status">Status</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="pendingRadio" value="Pending">
                        <label class="form-check-label" for="pendingRadio">Pending</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="inProgressRadio" value="InProgress">
                        <label class="form-check-label" for="inProgressRadio">InProgress</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="completedRadio" value="Completed">
                        <label class="form-check-label" for="completedRadio">Completed</label>
                    </div>
                    @error('status')
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