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
                        {{$user->nickname}} 
                    </a> 
                </h4>
            </div>
    
            <div class="nav-item " id="nav_item" >
                 <div class="nav-item">
                     <a href="" class="nav-link"><i class="bi bi-cash-stack" style="font-size: 1.5em"></i></a>
                     <span class="text">Payment</span>
                 </div>
                 <div class="nav-item">
                     <a href="" class="nav-link"><i class="bi bi-clock-history" style="font-size: 1.5em"></i></a>
                     <span class="text">History</span>
                     
                 </div>
                 <div class="nav-item" >
                     <a href="{{route('add_view')}}" class="nav-link"><i class="bi bi-plus-square" style="font-size: 1.5em"></i></a>
                     <span class="text">Add</span>
                     
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
                <a href="" class="btn btn-outline-light receipt_btn mt-3">Get Payment Receipt</a>
            </div>

            
            <div class="container" id="payment_enter">
                <div class="container p 5">
                    Payment History:
                </div>
            </div>
        </div>

        
    </div>
   
   

</div>
@endsection
