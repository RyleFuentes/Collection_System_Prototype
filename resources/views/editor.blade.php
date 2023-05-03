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


<nav class="navbar text-white p-3">
    <a href=""   class="nav-link"><h3>Editor</h3></a>
    <div class="nav-content nav-div d-flex" style="gap: 1.5em">
        <a href="" class="nav-link">History</a>
        <a href="{{route('logout')}}" class="nav-link">Logout</a>
    </div>
    
</nav>


@if (Session::get('message'))
    <div class="alert alert-warning" role="alert">{{Session::get('message')}}</div>
@endif

<div class="container-fluid table_container mt-5">
    <div class="container search ">
        <input type="text" class="form-control search-bar">
        <button class="btn search-btn btn-dark" type="submit">Search</button>
    </div>
    <table class="table table-success table_test">
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Running balance</th>
            <th scope="col">Extra balance</th>
            <th scope="col">Action</th>
        </thead>

        <tbody class="text-black">
            @if ($filteredMembers)
                @foreach ($filteredMembers as $item)
                <tr>
                    
                    <td>{{$item->FirstName}}</td>
                    <td>{{$item->running_balance}}</td>
                    <td>Hello</td>
                    
                    <td>
                        <button type="submit" class="btn updateBtn btn-outline-dark">Update</button>
                        <button type="submit" class="btn deleteBtn btn-outline-dark">Delete</button> 
                    </td>
                </tr> 
                    
                @endforeach
            @else
                @foreach ($members as $item)
                <tr>
                    
                    <td>{{$item->FirstName}}</td>
                    <td>test</td>
                    <td>Hello</td>
                    
                    <td>
                        <button type="submit" class="btn updateBtn btn-outline-dark">Update</button>
                        <button type="submit" class="btn deleteBtn btn-outline-dark">Delete</button> 
                    </td>
                </tr> 
                
                @endforeach
            @endif
            
                
            </tr>
        </tbody>
    </table>
</div>


@endsection