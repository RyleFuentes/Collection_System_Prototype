@extends('Master_layout.loggedin_layout')

@section('title')
    User Dashboard
@endsection

<!--links the css from the master's layout--->
@section('css_design')
    manualcss/dashboard.css
@endsection

@section('body-content')

<div class="container-fluid">
    <nav class="nav fixed-top" id="navDash" >
        <div class="container-fluid" id="navContents">
 
            <div class="nav-item profile_logo" id="Logo">
                <h4 class="text-white">
                    <a href="{{route('profile.index')}}">
                        <i class="bi bi-person-check" style="font-size:2em"></i>
                        {{$user->FirstName}} 
                    </a> 
                </h4>
            </div>
    
            <div class="nav-item " id="nav_item" >
                 <div class="nav-item">
                     <a href="" class="nav-link"><i class="bi bi-cash-stack" style="font-size: 1.5em"></i></a>
                     <span class="text">Payment</span>
                 </div>
                 <div class="nav-item">
                     <a href="{{route('history', $user->user_id)}}" class="nav-link"><i class="bi bi-clock-history" style="font-size: 1.5em"></i></a>
                     <span class="text">History</span>
                     
                 </div>
                 
                 <div class="nav-item">
                     <a href="" class="nav-link"><i class="bi bi-patch-question" style="font-size: 1.5em"></i></a>
                     <span class="text">Question</span>
 
                 </div>
 
                 <div class="nav-item ">
                     <a href="{{route('logout')}}" class="nav-link"><i class="bi bi-door-closed" style="font-size: 1.5em"></i></a>
                     <span class="text">Logout</span>
 
                 </div>
                
                
                
            </div>
        </div>
     </nav>
</div>


<div class="container-fluid" id="body_cont">

 
    @if (Session::get('message'))
        <div class="alert alert-success  mb-3 m-auto" role="alert" style="width: 300px"> {{Session::get('message')}}</div>
    @endif

    @if (Session::get('err_msg'))
        <div class="alert alert-danger  mb-3 m-auto" role="alert" style="width: 300px">{{Session::get('err_message')}}</div>
    @endif



    <div class="container  " id="balance_display">
        <div class="title mb-5">
            <h1 class="text-white text-center">Payment Information</h1>
        </div>

        <div class="payment_info">
            <div class="container">

                <h3 class="text-white">Running Balance</h3>
                <div class="container p-5" id="payment">
                    @if ($fetch)
                    <h1 class="text-center">₱ {{$fetch}}</h1>
                    @else
                        <h1 class="text-center">No data found</h1>
                    @endif
                 
                  
                </div>


                
                <a href="{{route('add_transaction', $user->user_id)}}" class="btn btn-outline-light receipt_btn mt-3" >
                    Request payment!
                </a>

            </div>

            
            
            <div class="container" id="payment_enter">
                <div class="card-top">
                    <h3>REQUEST HISTORY</h3>
                </div>
                <div class="container p 5">
                    

                    <div class="container request p-5">
                  
                        
                            

                                @foreach ($user_transaction as $item)
                                    @if($item->Status == 0)
                                        <div class="card holder bg-warning">
                                            <div class="card-header">
                                                <strong>Status: Pending</strong>
                                            </div>
        
                                            <div class="card-body">
                                                <li>Amount:  ₱ {{$item->Amount}}</li>
                                                <li>Date: {{$item->transaction_date}}</li>
                                            </div>
                                        </div>
                                   
        
                                    @endif
                                @endforeach
                            
                    </div>
             
   
                   
                </div>
            </div>
        </div>

        
    </div>
   
   

</div>
@endsection
