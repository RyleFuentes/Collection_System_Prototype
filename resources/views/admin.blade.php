@extends('Master_layout.loggedin_layout')

@section('title') ADMIN @endsection
@section('css_design') admin.css @endsection
@section('body-content')

<!--update modal object -->



  

    @section('body-class') bg-dark @endsection

    <div class="container-fluid body">
       
        
            <nav class="nav">
                <div class="logo text-white">Admin</div>


                <div class="search-container">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <div class="form-group form-search d-flex">
                            <input type="text" name="search_user" class="form-control" placeholder="Search...">
                            <button type="submit"  class="btn btn-success "> <i class="bi bi-search"></i> </button>
        
                        </div>
                    </form>
                </div>


                <div class="navigation">
                    <li><a href="">Add user</a></li>
                    <li><a href="{{route('logout')}}">logout</a></li>
                </div>


                 
       
            </nav>


        @if (Session::get('delete_mssg'))
            <div class="alert alert-success" role="alert">{{Session::get('delete_mssg')}}</div>
        @endif
        
        

       <div class="container main-body">

           <div class="container general_users_container general_holder">
    
           
               <div class="header">
                   <h1>General users</h1>
               </div>
               <div class="user-container">
                   @if ($users->where('role', 0)->count() > 0)
                   @foreach ($users as $user)
                       @if ($user->role == 0)  
                           <div class="card" style="width: 15rem; border-radius: 20px;">
                               <img src="images/body_background.jpg" class="card-img-top" style="border-radius: 20px" alt="...">
                               <div class="card-body">
                                   <h6>First Name: {{$user->FirstName}}</h6> 
                                   <h6>Last Name: {{$user->Lastname}}</h6> 
                                   <h6>Email: {{$user->Email}}</h6> 
    
                                   <div class="card-item d-flex">
    
                                       <a href="#" class="btn btn-primary">Go somewhere</a>
                                       <a href="{{route('delete', $user->user_id)}}" class="btn btn-danger">Delete user</a>
                                   </div>
                               </div>
                           </div>
                          
                           
                       @endif
                   @endforeach
                   @else
                   <div class="alert alert-danger" role="alert"> no records found</div>
    
                   @endif
               </div>
           </div>
    
           <div class="container editor_container general_holder">
    
           
               <div class="header">
                   <h1>Editors</h1>
               </div>
               <div class="user-container">
                   @if ($users->where('role', 1)->count() > 0)
                   @foreach ($users as $user)
                       @if ($user->role == 1)  
                       <div class="card" style="width: 15rem; border-radius: 20px;">
                           <img src="images/body_background.jpg" class="card-img-top" style="border-radius: 20px" alt="...">
                           <div class="card-body">
                               <h6>First Name: {{$user->FirstName}}</h6> 
                               <h6>Last Name: {{$user->Lastname}}</h6> 
                               <h6>Email: {{$user->Email}}</h6> 
    
                               <div class="card-item d-flex">
    
                                   <a href="#" class="btn btn-primary">Go somewhere</a>
                                   <a href="{{route('delete', $user->user_id)}}" class="btn btn-danger">Delete user</a>
                               </div>
                           </div>
                       </div>
                      
                       @endif
                   @endforeach
                   @else
                           <div class="alert alert-danger" role="alert"> no records found</div>
    
                   @endif
               </div>
           </div>
    
    
    
           <div class="container admin_container  general_holder">
    
           
               <div class="header">
                   <h1>Admin</h1>
               </div>
               <div class="user-container">
                   
                   @if ($users->where('role', 2)->count() > 0)
                       
                       @foreach ($users as $user)
                           @if ($user->role == 2)  
                           <div class="card" style="width: 15rem; border-radius: 20px;">
                               <img src="images/body_background.jpg" class="card-img-top" style="border-radius: 20px" alt="...">
                               <div class="card-body">
                                   <h6>First Name: {{$user->FirstName}}</h6> 
                                   <h6>Last Name: {{$user->Lastname}}</h6> 
                                   <h6>Email: {{$user->Email}}</h6> 
    
                                   <div class="card-item d-flex">
    
                                       <a href="#" class="btn btn-primary">Go somewhere</a>
                                       <a href="{{route('delete', $user->user_id)}}" class="btn btn-danger">Delete user</a>
                                   </div>
                               </div>
                           </div>
                           @endif
                       @endforeach
                   @else
                           <div class="alert alert-danger" role="alert"> no records found</div>
    
                   @endif
                   
               </div>
           </div>
       </div>


    </div>


   

    

</div>




@endsection