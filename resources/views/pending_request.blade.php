@extends('Master_layout.loggedin_layout')

@section('title')
    Transaction page
@endsection

<!--links the css from the master's layout--->
@section('css_design')
    ../manualcss/pendingTransaction.css
@endsection

@section('body-content')


    <div class="container title">
        <strong><h1>PENDING PAYMENT REQUESTS</h1></strong>
    </div>
    <div class="container main-container">
        
        @if($requests)
            @foreach ($requests as $request)
                @if($request->Status == 0)
                <!--MEANS PENDING-->

                    <div class="card bg-warning">
                        <div class="card-header">
                           <strong>
                            Status: Pending
                            </strong>
                        </div>

                        <div class="card-body ">
                            <div class="form-group">
                                <label for="">User: </label>
                                <input type="text" class="form-control" name="userID" disabled value="{{$request->userID}}">
                            </div>

                            <div class="form-group">
                                <label for="">Amount: </label>
                                <input type="number" class="form-control" name="userID" disabled value="{{$request->Amount}}">
                            </div>


                            <div class="form-group">
                                <label for="">Date: </label>
                                <input type="text" name="userID" class="form-control" disabled value="{{$request->transaction_date}}">
                            </div>

                    
                        </div>

                        <div class="card-footer">
                            <button  class="btn btn-secondary">decline</button>
                            <form action="{{route('update_transaction', $request->transaction_id)}}" method="post">
                                @csrf
                                @method('PUT')

                                    <button type="submit" class="btn btn-success">Approve</button>
                                    
                                
                            </form>
                        </div>
                    </div>
                @endif

               
            @endforeach

        @endif

        
    </div>
  


@endsection