@extends('Master_layout.loggedin_layout')

@section('title')
    Transaction page
@endsection

<!--links the css from the master's layout--->
@section('css_design')
    ../manualcss/transaction.css
@endsection

@section('body-content')

    
<div class="container-fluid main-container">

  <div class="container">
      <div class="card-header mb-5">
        <h4>ADD NEW PAYMENT REQUEST</h4>
      </div>
      <form action="{{route('store_transaction', $user->user_id)}}" method="post">
        @csrf
          <div class="form-group">
            <div class="label">Amount: </div>
            <input type="number" name="amount" id="" class="form-control" >
          </div>

          <div class="form-group">
            <div class="label">Due Date: </div>
            <input type="date" name="date" id="" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <a href="{{route('dashboard')}}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-dark">Submit Request!</button>

      </form>
  </div>
</div>

@endsection