@extends('Master_Layout.loggedin_layout')
@section('css_design', '../manualcss/update_bal.css')
@section('body-content')

<h1>Hello</h1>

<div class="container main_container">
   <div class="card">
      <div class="card-header">
         <h1>Update User balance for {{$user->FirstName}}</h1>
      </div>
      <form action="{{route('update', $user->user_id)}}" method="post">
         @csrf
         @method('PUT')
         <div class="form-group update_container">


            <label for="" class="form-label">Running balance</label>
            <input type="number" name="running_balance" id="" class="form-control update-control" value="{{$runningBalance}}">
            <span class="text-danger">@error('running_balance') {{$message}}  @enderror</span>

         </div>

         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
         </div>
         
      </form>


   </div>
   
</div>

@endsection