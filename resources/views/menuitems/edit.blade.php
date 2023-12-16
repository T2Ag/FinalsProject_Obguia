@extends('pages.base')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Item Menu - {{$menuitem->Item_name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('menuitems/delete/' . $menuitem->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this Item in the Menu?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <h1>Update Item</h1>
    <div class="row"> 
        <div class="col-mid-3">
            <form action="{{url('menuitems/'.$menuitem->id)}}" method="POST">
                @csrf                
                <div class="form-group mt-2">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" class="form-control" value="{{$menuitem->item_name}}">
                    @error('item_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" value="{{$menuitem->description}}">
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" value="{{$menuitem->price}}">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="form-group mt-2">
                    <label for="img_link">Image Link</label>
                    <input type="text" name="img_link" class="form-control" value="{{$menuitem->img_link}}">
                    @error('img_link')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="category">category</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="drinkRadio" value="Drink" {{ $menuitem->category === 'Drink' ? 'checked' : '' }}>
                        <label class="form-check-label" for="drinkRadio">Drink</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="mealRadio" value="Meal" {{ $menuitem->category === 'Meal' ? 'checked' : '' }}>
                        <label class="form-check-label" for="mealRadio">Meal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="dessertRadio" value="Dessert" {{ $menuitem->category === 'Dessert' ? 'checked' : '' }}>
                        <label class="form-check-label" for="dessertRadio">Dessert</label>
                    </div>
                    @error('category')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Item
                    </button>
                    <button class="btn btn-dark">
                        Save Item
                    </button>                    
                </div>
 
            </form>
        </div>
    </div>

@endsection