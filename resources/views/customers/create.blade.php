@extends('pages.base')

@section('content')
    <h1>Create New User</h1>
    <div class="row"> 
        <div class="col-mid-3">
            <form action="{{url('customers/create')}}" method="POST">
                @csrf                
                <div class="form-group mt-2">
                    <label for="first_Name">First Name</label>
                    <input type="text" name="first_Name" class="form-control">
                    @error('first_Name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="last_Name">Last Name</label>
                    <input type="text" name="last_Name" class="form-control">
                    @error('last_Name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control">
                    @error('phone')
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