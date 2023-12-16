@extends('pages.base')

@section('content')

<div class="homeTitle">
    <h1>Eat like nobody's watching!</h1>
</div>

<div style="text-align: center;">
    <a href="{{ url('/customers/create') }}" class="btn btn-primary homebuttonorder" style="background-color: white; color: black; font-size: 24px; font-family: 'Lobster', cursive; border: none; transition: transform 0.1s ease-in-out; text-decoration: none;">
        Order now
    </a>
</div>  

<style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    body{
        background-image: url('https://eatdrinkflash.co.uk/wp-content/uploads/2021/06/DSC00807-scaled.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: rgba(0, 0, 0, .7); 
        background-blend-mode: multiply;
    }

    h1{
        color: white;
        font-family: 'Lobster';
    }

    .homeTitle h1{
        font-size: 100px;
        text-align: center;
        margin-bottom: 100px;
    }

    .homebuttonorder:hover {
        transform: scale(1.1);
    }
</style>

@endsection
