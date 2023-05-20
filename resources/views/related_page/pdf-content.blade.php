@extends('Master_layout.loggedin_layout')

@section('title')
    Transaction History
@endsection



@section('body-content')

<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-header{
        border-bottom: 2px solid black;
        margin-bottom: 2em;
  
    }

    .container{
        width: max-content;
    }
    .container li{
        list-style: none;
    }

    .card{
        background-color: aquamarine;
        padding: 2em;
        width: max-content;
    }
</style>


<div class="container bg-info">
    <div class="card ">
        <div class="card-header"><h1>REPORT</h1></div>
        <div class="card-body">
            
            <li><strong>Name: </strong> {{$user->FirstName}}</li>

            <li><strong>Transaction date:</strong> {{$transaction->transaction_date}}</li>
            <li><strong>Amount: </strong>   {{$transaction->Amount}}</li>
            
        </div>
    </div>
    
</div>

@endsection