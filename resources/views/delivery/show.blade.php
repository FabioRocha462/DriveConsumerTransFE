@extends('layouts.main')
@section('title', 'show')
@section('content')
<div class='container fluid'>
    <div class="contaner">
            <div class="row align-items-start">
                <div class="col">
                <h5>Nome do Cliente: <strong>{{$datas['name']}}</strong></h5>
                </div>
                <div class="col">
                <h5>CPF do Cliente: <strong>{{$datas['cpf']}}</strong></h5>
                </div>
                <div class="col">
                <h5>Telefone do Cliente: <strong>{{$datas['phone']}}</strong></h5>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col">
                <h5>Rua: <strong>{{$datas['locality']}}</strong></h5>
                </div>
                <div class="col">
                <h5>localidade: <strong>{{$datas['local']}}</strong></h5>
                </div>
                <div class="col">
                <h5>Bairro do Cliente: <strong>{{$datas['district']}}</strong></h5>
                </div>
            </div>
            <hr>
            <div class="row align-items-end">
                <div class="col">
                <h5>Cidade do Cliente: <strong>{{$datas['city']}}</strong></h5>
                </div>
                <div class="col">
                <h5>Estado do Cliente: <strong>{{$datas['state']}}</strong></h5>
                </div>
                <div class="col">
                <h5>numero da casa: <strong>{{$datas['number']}}</strong</h5>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-4">
                <h5>Data limite para Entrega: <strong>{{date('d/m/y',strtotime($datas['date_delivery']))}}</strong></h5>
                </div>
                <div class="col-4">
                <h5>código de rastreio: <strong>{{$datas['tracking_cod']}}</strong></h5>
                </div>
            </div>
            <hr>
        
    </div>
</div>
<div class="container fluid">
    <div class= "container">
        <div class="center">
        <a href="/choosedelivery/{{$datas['id_delivery']}}" class="btn btn-dark">Escolher Entrega</a>
        </div>
    </div>
</div>
@if(!empty($msg))
<div class="msg">
    <h5>{{$msg}}</h5>
</div>
@endif


@endsection