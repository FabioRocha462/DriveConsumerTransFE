@extends('layouts.main')
@section('title', 'Login TransFÉ')
@section('content')
<div class="container fluid">
    <div class= "container">
        <div class="center">
            <h2><Strong>Login TransFÉ</Strong></h2>
        </div>
    </div>
</div>
<div class="container fluid">
    <div class= "container">
        <div class="center">
            <img src="{{URL::asset('img/truck.png')}}" alt="" width="250px" heigth="250px" border-radios="360px">
        </div>
    </div>
</div>

<div class="container fluid">
    <div class= "container">
        <div class="login-server">
        <form  class="row g-3" action="/createtoken" method="POST">
        @csrf
                <label for="staticEmail2" class="visually-hidden">Email</label>
                <input type="text" required name='email' class="form-control" id="staticEmail2" placeholder = "email">

            
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input type="password" name="password" required class="form-control" id="inputPassword2" placeholder="Password">

            
                <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>

        </form>
        </div>
    </div>
    @if(!empty($msg))
        <div class="msg">
            <h5>{{$msg}}</h5>
        </div>
    @endif
</div>
@endsection