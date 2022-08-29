@extends('layouts.main')
@section('title', 'show')
@section('content')
<div class="container fluid">
    <div class= "container">
        <div class="center">
        <form action="/sendlocality/{{$id}}" methotd="GET" class="row g-3">
        <div class="col-auto">
            <label for="staticEmail2" class="visually-hidden">Email</label>
            <input type="text" required name='locality' class="form-control" id="staticEmail2">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Confirm locality</button>
        </div>
</form>
        </div>
    </div>
</div>
@if(!empty($msg))
<div class="msg">
    <h5>{{$msg}}</h5>
</div>
@endif
@endsection