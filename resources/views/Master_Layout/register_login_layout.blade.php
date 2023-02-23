<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="login_css.css">
</head>
<body>
   <nav class="nav navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{route('welcome.index')}}">
            <H3 class="text-white">COLLECTION <i class="bi bi-piggy-bank-fill" style="color:gold"></i></H3>
            
        </a>
    </div>
    <div class="nav_a">

        <a  href="{{ route('login.index') }}" aria-current="page">Login</a>    
        <a  href="{{ route('register_login.index') }}" aria-current="page">Register</a>
    </div>
     
   </nav>
    
    @yield('body')



    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>