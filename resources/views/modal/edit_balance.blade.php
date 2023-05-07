@extends('Master_Layout.loggedin_layout')

@section('body-content')

<h1>Hello</h1>

<div class="container">
   <h3>{{ $user->FirstName }}</h3>
   <h3>{{ $user->role }}</h3>
   <h3>{{ $runningBalance }}</h3>
</div>

@endsection