<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="@yield('css_design')">
    <title>@yield('title')</title>
</head>
<body class="@yield('body-class')">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="{{url('/')}}" class="nav-link" data-bs-toggle="route" data-bs-target="{{url('/')}}">Welcome</a>
        </li>
       
        <li class="nav-item" role="presentation">
            <a href="{{route('login.index')}}" class="nav-link" data-bs-toggle="route" data-bs-target="{{route('login.index')}}">Login</a>
        </li>
       
    </ul>

   
@yield('body-content')

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>