@extends('Master_Layout.welcome_layout')
@section('body-content')
    
    <div class="container justify-content-center mt-5" >
        

        <div class="container bg-dark p-3 text-white"  style="width: 500px; border-radius: 20px; ">
            <div class="container m-auto text-center" >

                <i class="bi bi-person-circle  " style="font-size: 3em; color:white"></i>
            </div>
            <h1 class="text-center">Login</h1>
            

            @if(session('error'))
             <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            
            @if(session('message'))
             <div class="alert alert-success">{{ session('message') }}</div>
            @endif

           

            <form action="{{ route('auth') }}" method="post" class="p-3 " style="">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group ">
                        <span class="input-group-text bg-dark">
                            <i class="bi bi-envelope-at" style="color:white"></i>
                        </span>
                        <input type="text" name="email_login" class="form-control" placeholder="e.g rylefuentes09@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Password" class="form-label">Password</label>

                    <input type="password" name="password_login" class="form-control" placeholder="******">
                </div>
               
                <div class="mt-3 text-center">

                    <button type="submit" class="btn btn-outline-success">Login</button>
                </div>
            </form>
        </div>
    </div>


@endsection