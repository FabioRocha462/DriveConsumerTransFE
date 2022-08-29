@extends('layouts.main')
@section('title', 'show')
@section('content')
<div class="container fluid">
    <div class= "container">
         @if(!empty($deliverys))
         <table class="table">
            <thead>
                <tr>
                    <th scope="col">Datas</th>
                    <th scope="col">Datas da Entrega</th>
                    <th scope="col">Ações Para as Entregas</th>
                </tr>
            </thead>
        <tbody>
            
            @foreach($deliverys as $d)
            <tr>
                @if($d['status'] == 0)
                    <td><strong>{{date('d/m/y',strtotime($d['date']))}}</strong></td>
                    <td><strong>{{date('d/m/y',strtotime($d['date_delivery']))}}</strong></td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col">    
                                <a href="/renderlocality/{{$d['id_delivery']}}"><button type="button" class="btn btn-success">Atualizar Localização</button></a>
                                
                            </div>
                        
                            <div class="col">    
                                <a href="/enddelivery/{{$d['id_delivery']}}"><button type="button" class="btn btn-dark">Confirmar Entrega</button></a>
                            </div>
                        </div>
                    </td>
                @endif
                @endforeach
            </tr>
        </tbody>

    </table>
    
         @endif
    </div>
<div>
@endsection