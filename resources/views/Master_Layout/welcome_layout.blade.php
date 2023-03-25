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

    <nav class="nav" >
        <div class="nav-item " style="display: flex;flex-direction: row; justify-content:space-between; width: 100%">

            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}"><h1>Collection</h1></a>
            </li>
            
        </div>
    
    </nav>

    @yield('body-content')

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
