@extends('Master_Layout.welcome_layout')
@section('body-class') bg-dark @endsection
@section('css_design') manualcss/welcome.css @endsection
@section('body-content')

  <div class="container-fluid body">

    <div class="container text-center p-3 mb-5">
      <h1 class="text-white">Welcome to my project 🤣</h1>
    </div>

    <div class="container button_container m-auto text-center">

      <form action="{{route('login.index')}}" >
        @csrf
        <button type="submit text-center">
          Get Startedsss!
          <div id="clip">
              <div id="leftTop" class="corner"></div>
              <div id="rightBottom" class="corner"></div>
              <div id="rightTop" class="corner"></div>
              <div id="leftBottom" class="corner"></div>
          </div>
          <span id="rightArrow" class="arrow"></span>
          <span id="leftArrow" class="arrow"></span>
        </button>
      </form>
    </div>
    </div>

@endsection