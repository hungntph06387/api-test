@extends('homepage')

@section('navbar')
<div class="my-header">
    <div class="mycontainer">
        <!--START NAVBAR -->
        <div class="navbar">
            <div class="logo">
                <img src="/images/logo.jpg" alt="" width="125px">
            </div>
            <nav class="">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="/login">Login</a></li>
                </ul>
            </nav>

            @if(Session::get('loggedUser'))
                <a href="#">{{Auth::user()->name}}</a> / <a href="/logout">Logout</a>
                {{--<img src="{{ Auth::user()->avatar }}" alt="Facebook Avatar" height="64" width="64">--}}
            @endif
        </div>
    </div>
</div>
@endsection
