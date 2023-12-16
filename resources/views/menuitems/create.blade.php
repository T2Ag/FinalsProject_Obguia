@extends('pages.base')

@section('content')
    <h1>Create New User</h1>
    <div class="row"> 
        <div class="col-mid-3">
            <form action="{{url('menuitems/create')}}" method="POST">
                @csrf                
                <div class="form-group mt-2">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" class="form-control">
                    @error('item_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control">
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="img_link">Image Link</label>
                    <input type="text" name="img_link" class="form-control">
                    @error('img_link')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="category">Category</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="drinkRadio" value="Drink">
                        <label class="form-check-label" for="drinkRadio">Drink</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="mealRadio" value="Meal">
                        <label class="form-check-label" for="mealRadio">Meal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="dessertRadio" value="Dessert">
                        <label class="form-check-label" for="dessertRadio">Dessert</label>
                    </div>
                    @error('category')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-dark">
                            Add Item
                    </button>                    
                </div>
 
            </form>
        </div>
    </div>

@endsection