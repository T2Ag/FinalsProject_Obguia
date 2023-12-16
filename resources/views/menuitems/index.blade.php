@extends('pages.base')

@section('content')
@if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 buttondiv">
    <a href="{{ url('menuitems/create')}}" class="btn btn-dark me-md-2" type="button">Add New Item in the Menu</a>
</div>

<table class="table table-bordered table-striped table-sm">
    

<div class="d-flex flex-wrap justify-content-center">
        @foreach ($menuitems as $menuitem)
            <div class="card m-3" style="width: 18rem;">
                    <div class="ratio ratio-1x1">
                        <img src="{{ $menuitem->img_link }}" class="card-img-top img-fluid" style="object-fit: cover;" alt="An image of a food">
                    </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $menuitem->item_name }}</h5>
                    <p class="card-text">{{ $menuitem->description }}</p>
                    <p class="card-text">{{ $menuitem->price }}</p>
                    <p class="card-text">{{ $menuitem->category }}</p>
                    <a href="{{ url('menuitems/'.$menuitem->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>


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