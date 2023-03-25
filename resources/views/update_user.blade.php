@extends('Master_layout.loggedin_layout')

@section('title') Update @endsection
@section('css_design') manualcss/update.css @endsection
@section('body-content')

<div class="container body m-auto">
   
    <form action="{{ route('add_user', $user->user_id) }}" method="post" class="p-3 text-dark form_update" style="">
        @csrf
        <div class="form-group">
            <label for="FirstName" class="form-label" >First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="e.g Ryle" value="{{$user->FirstName}}">
            
            <span class="text-danger">@error('fname') {{$message}}  @enderror</span>
            
        </div>
        <div class="form-group">
            <label for="Lastname" class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="e.g Fuentes" value="{{$user->Lastname}}">
            <span class="text-danger">@error('lname') {{$message}}  @enderror</span>
        </div>
        <div class="form-group">
            <label for="Email" class="form-label">Email</label>
            <div class="input-group">
                
                <span class="input-group-text bg-warning">
                    <i class="bi bi-envelope-at" style="color:white"></i>
                </span>
                <input type="text" name="email" class="form-control" placeholder="e.g rylefuentes09@gmail.com" value="{{$user->Email}}">
            </div>
            <span class="text-danger">@error('email') {{$message}}  @enderror</span>
        </div>
       

        <div class="form-group role_radio text-black">
            <label for="" class="form-label">Role</label>
            <ul>
                <li><input type="radio" name="role" class="form-radio" value="0"> 0: General Users</li>
                <li><input type="radio" name="role" class="form-radio" value="1"> 1: Editor</li>
                <li><input type="radio" name="role" class="form-radio" value="2"> 2: Secretary</li>
            </ul>
            
            
            
        </div>
        

        <div class=" text-center">

            <button type="submit" class="btn btn-warning text-white">Add User!</button>
        </div>
    </form>
</div>
@endsection