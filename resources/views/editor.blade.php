@extends('Master_layout.loggedin_layout')

@section('title')
    User Dashboard
@endsection

<!--links the css from the master's layout--->
@section('css_design')
    manualcss/editor.css
@endsection

@section('body-class') body_css @endsection
@section('body-content')


<nav class="navbar bg-dark text-white p-3" data-bs-theme="dark">
    <a href=""   class="nav-link"><h3>Editor</h3></a>
    <div class="nav-content d-flex" style="gap: 1.5em">
        <a href="" class="nav-link">History</a>
        <a href="{{route('logout')}}" class="nav-link">Logout</a>
    </div>
    
</nav>


@if (Session::get('message'))
    <div class="alert alert-warning" role="alert">{{Session::get('message')}}</div>
@endif

<div class="container-fluid table_container mt-5">
    <table class="table table-success table_test">
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Running balance</th>
            <th scope="col">Extra balance</th>
        </thead>

        <tbody class="text-black">
            @foreach ($members as $item)
                <tr>
                    <td>{{$item->FirstName}}</td>
                    <td>test</td>
                    <td>Hello</td>
                </tr>
                
            @endforeach
                
            </tr>
        </tbody>
    </table>
</div>


@endsection