@extends('Master_layout.loggedin_layout')

@section('title')
    User Profile
@endsection

<!--links the css from the master's layout--->
@section('css_design')
    manualcss/profile.css
@endsection

@section('body-content')
    <h1>{{$current->nickname}}</h1>
    
    <form action="{{route('check_pass')}}" method="post">
        @csrf
        @if (Session::get('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if (Session::get('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <input type="password" name="current_pass" >
        <button type="submit">check</button>
    </form>
@endsection