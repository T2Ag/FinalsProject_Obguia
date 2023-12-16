<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HackDonalds</title>
    {{-- <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
        .navbar{
            margin-bottom: 20px;
            padding: 10px 50px;
            color: white;
        }

        .navbar h1 {
            color: rgb(255, 255, 255); 
        }

        .nav-pills .nav-link {
            color: white !important;
            transition: 0.3s ease; 
            margin: 0 5px;
        }

        .nav-pills .nav-link:hover {
            background-color: #fff;
            color: black !important;
        }

        .nav-pills .nav-link.active {
            background-color: #fff;
            color: black !important;
        }


        .container {
            margin-top: 50px;
        }

        .title{
            color: white;
            font-family: 'Lobster';
        }


    
    </style>
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: rgb(0, 0, 0)">
        <h1 class="title">HackDonalds</h1>

        <ul class="nav justify-cintent-end float-right nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home') ? 'active' : ''}}" href="{{url('/home')}}">Home</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->is('menuitems') ? 'active' : ''}}" href="{{url('/menuitems')}}">Menu Items</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('customers') ? 'active' : ''}}" href="{{url('/customers')}}">Customers</a>
            </li>

          

            <li class="nav-item">
                <a class="nav-link {{ request()->is('orders') ? 'active' : ''}}" href="{{url('/orders')}}">Orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('orderdetails') ? 'active' : ''}}" href="{{url('/orderdetails')}}">Order Details</a>
            </li>

        </ul>
    </nav>

    <div class="container at-5">
        @yield('content')
    </div>
</body>
</html>