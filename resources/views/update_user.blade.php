@extends('Master_layout.loggedin_layout')

@section('title') Update @endsection
@section('css_design', '../manualcss/update.css') 
@section('body-content')

<div class="container main_cont">
    <div class="container">
        <h2 class="text-center mb-4">Update User</h2>
    </div>
    <form action="{{ route('update_user_role', $user->user_id) }}" method="post" class="p-3 text-dark form_update" style="">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="FirstName" class="form-label" >First Name</label>
            <input type="text" name="fname" class="form-control input" placeholder="e.g Ryle" value="{{$user->FirstName}}">
            
            <span class="text-danger">@error('fname') {{$message}}  @enderror</span>
            
        </div>
        <div class="form-group">
            <label for="Lastname" class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control input" placeholder="e.g Fuentes" value="{{$user->Lastname}}">
            <span class="text-danger">@error('lname') {{$message}}  @enderror</span>
        </div>
        <div class="form-group">
            <label for="Email" class="form-label">Email</label>
            <div class="input-group email_cont">
                
                <span class="input-group-text bg-warning">
                    <i class="bi bi-envelope-at" style="color:white"></i>
                </span>
                <input type="text" name="email" class="form-control input_email" placeholder="e.g rylefuentes09@gmail.com" value="{{$user->Email}}">
            </div>
            <span class="text-danger">@error('email') {{$message}}  @enderror</span>
        </div>
       

        <div class="form-group role_radio text-black">
            <label for="" class="form-label">Role</label>
            <ul>
                @if ($user->role == 0)
                    <li><input type="radio" name="role" class="form-radio" value="0" checked> General Users</li>
                    <li><input type="radio" name="role" class="form-radio" value="1"> Editor</li>
                    <li><input type="radio" name="role" class="form-radio" value="2"> Secretary</li>
                @endif

                @if ($user->role == 1)
                    <li><input type="radio" name="role" class="form-radio" value="0"> General Users</li>
                    <li><input type="radio" name="role" class="form-radio" value="1" checked> Editor</li>
                    <li><input type="radio" name="role" class="form-radio" value="2"> Secretary</li>
                @endif

                @if ($user->role == 2)
                    <li><input type="radio" name="role" class="form-radio" value="0"> General Users</li>
                    <li><input type="radio" name="role" class="form-radio" value="1"> Editor</li>
                    <li><input type="radio" name="role" class="form-radio" value="2" checked> Secretary</li>
                @endif
                
            </ul>
            
            
            
        </div>
        

        <div class=" text-center">

            <button type="submit" class="btn btn-warning text-white">Update User Information!</button>
        </div>
    </form>
</div>
@endsection