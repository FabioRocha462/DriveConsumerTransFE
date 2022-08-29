@extends('layouts.main')
@section('title', 'dashboard')
@section('content')
@if(!empty($msg))
<div class='msg'>{{$msg}}</div>
@endif
<div class="container fluid">
    <div class= "container">
        <div class="center">
            <form action ="/searchdelivery" method= "GET" class="row g-3" id="form-delivery">
                <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden">Pesquisar por Cidade</label>
                    <input type="text"  name ="city" class="form-control" id="staticEmail2" placeholder="Nome da Cidade">
                </div>
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Pesquisar por Estado</label>
                    <input type="text" name="state" class="form-control" id="inputPassword2" placeholder="Estado">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Enviar Pesquisa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    @if(!empty($datas))
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Local</th>
                <th scope="col">Detalhar Entrega</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach ($datas as $d)
            <tr>
                @if($d['status'] == 0 && $d['status_available'] ==0 && $d['id_driver'] == null)
                    <td>{{$d['city']}} </td>
                    <td>{{$d['state']}} </td>
                    <td>{{$d['local']}} </td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col">    
                                <a href="/showdatesdelivery/{{$d['id_delivery']}}"><button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg></button></a>
                            </div>
                        </div>
                    </td>
                @endif
                @endforeach
            </tr>
        </tbody>

    </table>
    @else
    <div class="msg">
        <h5>Não temos Entregas</h5>
    </div>
    @endif
</div>
@endsection
