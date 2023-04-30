@extends('Master_layout.loggedin_layout')

@section('title') ADMIN @endsection
@section('css_design') manualcss/admin.css @endsection
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
                    <!-- Button trigger modal -->
                    @include('modal.add_user_modal')
                    <li><a href="" data-bs-toggle="modal" data-bs-target="#update_modal">Add user</a></li>
                    <li><a href="{{route('logout')}}">logout</a></li>
                </div>


                 
       
            </nav>


      
       <div class="container main-body">
        @if (Session::get('delete_mssg'))
            <div class="alert alert-success m-auto" role="alert" style="width: 300px">{{Session::get('delete_mssg')}}</div>
        @endif
        @if (Session::get('message'))
            <div class="alert alert-success  m-auto" role="alert" style="width: 300px"> {{Session::get('message')}}</div>
        @endif

        @if (Session::get('err_message'))
            <div class="alert alert-danger  m-auto" role="alert" style="width: 300px">{{Session::get('err_message')}}</div>
        @endif

           <div class="container general_users_container general_holder">
    
            @include('modal.update_role_modal')
           
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
    
                                       <a href="{{route('edit', $user->user_id)}}" class="btn btn-primary" > Edit role</a>
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
    
                                   <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_role" data-bs-id="{{$user->user_id}}">Edit role</a>
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
    
                                       <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_role" data-bs-id="{{$user->user_id}}">Edit role</a>
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