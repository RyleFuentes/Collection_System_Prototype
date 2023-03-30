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

<div class="nav">
    <nav class="nav_items">
        <h1>Collection system</h1>
        <a href="{{route('logout')}}">Logout</a>
    </nav>
</div>



<div class="container">
    <div class="content">
        <table>
            <th>Name</th>
            <th>Current Balance</th>

            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>
                        
                        {{$item->FirstName}}
                    </td>
                </tr>
                @endforeach

                @foreach ($balance as $data)
                <tr>
                    <td>{{$data->running_balance}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection