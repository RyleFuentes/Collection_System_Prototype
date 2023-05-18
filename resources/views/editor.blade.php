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
        <a href="{{route('pending-request.index')}}" class="nav-link">Pending Request</a>
        <a href="{{route('logout')}}" class="nav-link">Logout</a>
    </div>
    
</nav>


@if (Session::get('message'))
    <div class="alert alert-warning" role="alert">{{Session::get('message')}}</div>
@endif

<!----- SEARCH FUNCTION ----->
<div class="container-fluid table_container mt-5">
    <div class="container search ">
        <form action="{{route('search_mem')}}" method="get">
        @csrf
            <input type="text" name="search" class="form-control search-bar">
            <button class="btn search-btn btn-dark"  type="submit"><i class="bi icon bi-search"></i> </button>
        </form>
    </div>

  


<!---- TABLE DATA ------------>
    <table class="table table-success table_test">
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Running balance</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </thead>

        <tbody class="text-black">
            @if ($data)
                @foreach ($data as $item)
                <tr>
                    
                    
                    <td>{{$item['name']}}</td>
                    <td>
                        @if ($item['role'] == 2)
                            Not Available

                        @else
                            ₱ {{$item['running_balance']}}
                        @endif
                        
                    </td>
                    
                    <td>
                        @if ($item['role'] == 0)
                            <span class="role_container member">Orchestra member</span>
                        @endif

                        @if ($item['role'] == 1)
                            <span class="role_container editor">Editor</span>
                        @endif

                        @if ($item['role'] == 2)
                            <span class="role_container administrator">Administrator</span>
                        @endif
                    </td>
                    
                    <td>
                        @if($item['role'] == 2)
                            No access to this User
                        @else

                        <a href="{{route('update_bal', $item['userid'])}}" class="btn btn-dark"> <i class="bi bi-pencil-square"></i> Update</a>
                        @endif
                    </td>
                </tr> 
                    
                @endforeach
           
            @else
                <td>No use found</td>
                <td>No user found</td>
                <td>No User found</td>
                <td>No user found</td>
            @endif
            
                
            </tr>
        </tbody>
    </table>

    

    
       

</div>

    @if($searched)

        <div class="container paginatelink_container">
            <!-- Display pagination links -->
            {{ $searched->links() }}
        </div>
        
    @else


    <div class="container paginatelink_container">
        <!-- Display pagination links -->
        {{ $users->links() }}
    </div>
    @endif




@endsection