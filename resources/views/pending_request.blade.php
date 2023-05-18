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

                        <form action="{{route('update_transaction', $request->transaction_id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-footer">
                                <button  class="btn btn-secondary">decline</button>
                                <button type="submit" class="btn btn-success">Approve</button>
                                
                            </div>
                        </form>
                    </div>
                @endif

                @if($request->Status == 1)
                <!--MEANS PROCESSED-->

                    <div class="card bg-success">
                        <div class="card-header">
                            <strong>
                                Status: Processed
                                </strong>
                        </div>

                        <div class="card-body ">
                            <li>User: {{$request->userID}}</li>
                            <li>Date: {{$request->transaction_date}}</li>
                            <li>Amount:  ₱ {{$request->Amount}}</li>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-warning">Delete</button>
                        </div>
                    </div>
                @endif

                @if($request->Status == 2)
                <!--MEANS CANCELLED-->

                    <div class="card">
                        <div class="card-header">
                            <strong>
                                Status: Declined
                                </strong>
                        </div>

                        <div class="card-body ">
                            <li>User: {{$request->userID}}</li>
                            <li>Date: {{$request->transaction_date}}</li>
                            <li>Amount:  ₱ {{$request->Amount}}</li>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Approve</button>
                            <button class="btn btn-warning">decline</button>
                        </div>
                    </div>
                @endif
            @endforeach

        @endif

        
    </div>
    <div class="container paginatelink_container mt-5">
        <!-- Display pagination links -->
        {{ $requests->links() }}
    </div>


@endsection