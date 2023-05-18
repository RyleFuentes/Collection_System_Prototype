@extends('Master_layout.loggedin_layout')

@section('title')
    Transaction History
@endsection

<!--links the css from the master's layout--->
@section('css_design')
    ../manualcss/transaction_history.css
@endsection

@section('body-content')

    <div class="container mother_container">
        
        <div class="card">
            <div class="card-header"><h3>TRANSACTION HISTORY</h3></div>
            <div class="container test_container">

                <div class="container cards_container">
                    @foreach ($transactions as $item)
                                    @if($item->Status == 1)
                                        <div class="card holder bg-success">
                                            <div class="card-header">
                                                <strong>Status: Approved</strong>
                                            </div>
        
                                            <div class="card-body">
                                                <li>Amount:  ₱ {{$item->Amount}}</li>
                                                <li>Date: {{$item->transaction_date}}</li>
                                            </div>

                                            <div class="card-footer">
                                                <a href=""  class="btn btn-warning pdf_btn" >Generate pdf</a>
                                            </div>
                                        </div>
                                    
                                        
                                    @endif
                                @endforeach
                </div>
            </div>

            
        </div>
    </div>


@endsection