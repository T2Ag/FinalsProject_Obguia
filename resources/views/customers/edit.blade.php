@extends('pages.base')

@section('content')

  
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Customer - {{$customer->first_Name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('customers/delete/' . $customer->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this Customer?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <h1>Update User</h1>
    <div class="row"> 
        <div class="col-mid-2">
            <form action="{{url('customers/'.$customer->id)}}" method="post">
                @csrf                
                <div class="form-group mt-2">
                    <label for="first_Name">First Name</label>
                    <input type="text" name="first_Name" class="form-control" value="{{$customer->first_Name}}">
                    @error('first_Name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="last_Name">Last Name</label>
                    <input type="text" name="last_Name" class="form-control" value="{{$customer->last_Name}}">
                    @error('last_Name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$customer->phone}}">
                    @error('phone')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>            

                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Customer
                    </button>
                    <button class="btn btn-dark">
                        Save Customer
                    </button>                    
                </div>
 
            </form>
        </div>
    </div>

@endsection