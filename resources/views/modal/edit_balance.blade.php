@extends('Master_Layout.loggedin_layout')
@section('css_design', '../manualcss/update_bal.css')
@section('body-content')



<div class="container main_container">
   <div class="card card-container">
      <div class="card-header">
         <h1>Update balance | User: {{$user->FirstName}}</h1>
      </div>
      <form action="{{route('update', $user->user_id)}}" method="post">
         @csrf
         @method('PUT')
         <div class="form-group update_container">


            <label for="" class="form-label">Running balance</label>
            <div class="input-group">
               <span class="input-group-text text-white bg-dark">
                  ₱
               </span>
               <input type="number" name="running_balance" id="" class="form-control update-control" value="{{$user_balance}}">
            </div>
            <span class="text-danger">@error('running_balance') {{$message}}  @enderror</span>

         </div>

         <div class="card-footer">
            <button type="submit" class="btn update_btn ">Update</button>
            <a href="{{route('editor.index')}}" class="btn cancel_btn ">Cancel</a>
         </div>
         
      </form>


   </div>
   
</div>

@endsection