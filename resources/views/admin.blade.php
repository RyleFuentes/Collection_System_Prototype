@extends('Master_layout.loggedin_layout')

@section('title') ADMIN @endsection
@section('css_design') admin.css @endsection
@section('body-content')

<!--update modal object -->



  

    @section('body-class') bg-info @endsection

    <div class="container-fluid body">
        <h1 class="text-center">Hello this is the admin </h1>
        @if (Session::get('delete_mssg'))
            <div class="alert alert-success" role="alert">{{Session::get('delete_mssg')}}</div>
        @endif
        

        
        <div class="search-container">
            <form action="{{route('search')}}" method="post">
                @csrf
                <div class="form-group d-flex">
                    <input type="text" name="search_user" class="form-control" placeholder="Search...">
                    <button type="submit"  class="btn btn-success "> <i class="bi bi-search"></i> </button>

                </div>
            </form>
        </div>

        <div class="container general_users_container">

        
            <div class="header">
                <h1>General users</h1>
            </div>
            <div class="user-container">
                
                @foreach ($users as $user)
                    @if ($user->role == 0)  
                        <div class="container users  p-3" >
                            <h6>First Name: {{$user->FirstName}}</h6> 
                            <h6>Last Name: {{$user->Lastname}}</h6> 
                            <h6>Email: {{$user->Email}}</h6> 
                            

                            <div class="footer mt-3" >
                                
                                <a href="{{route('delete', $user->user_id)}}" >Delete user</a>
                            </div>
                            


                        </div>
                        
                    @endif
                @endforeach
                
            </div>
        </div>

        <div class="container editor_container mt-5">

        
            <div class="header">
                <h1>Editors</h1>
            </div>
            <div class="user-container">
                
                @foreach ($users as $user)
                    @if ($user->role == 1)  
                        <div class="container users  p-3" >
                            <h6>First Name: {{$user->FirstName}}</h6> 
                            <h6>Last Name: {{$user->Lastname}}</h6> 
                            <h6>Email: {{$user->Email}}</h6> 
                             


                            <div class="footer mt-3" >
                                
                                <a href="{{route('delete', $user->user_id)}}" >Delete user</a>
                            </div>
                        </div>
                    @endif
                @endforeach
                
            </div>
        </div>



        <div class="container admin_container mt-5">

        
            <div class="header">
                <h1>Admin</h1>
            </div>
            <div class="user-container">
                
                @foreach ($users as $user)
                    @if ($user->role == 2)  
                        <div class="container users  p-3" >
                            <h6>First Name: {{$user->FirstName}}</h6> 
                            <h6>Last Name: {{$user->Lastname}}</h6> 
                            <h6>Email: {{$user->Email}}</h6> 


                            <div class="footer mt-3" >
                                
                                <a href="{{route('delete', $user->user_id)}}" >Delete user</a>
                            </div>
                        </div>
                    @endif
                @endforeach
                
            </div>
        </div>

    </div>


   

    

</div>




@endsection