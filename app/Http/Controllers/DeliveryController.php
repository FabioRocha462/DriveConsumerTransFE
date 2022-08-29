<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Client\Response;
use Illuminate\Support\Facades\Http;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchDelivery(Request $request)
    {
        $city = $request->city;
        $state = $request->state;

        $user = auth()->user();
        $URL = 'http://127.0.0.1:8090/driver/delivery/address';

        $response = Http::withHeaders([
            'x-access-token' => $user->token
        ])->post($URL,['city'=>$city,'state'=>$state]);
        
        if ($response->serverError() == True)
        {
            $msg = 'Erro ao consutar o serviço';
            return view('dashboard',['msg'=>$msg]);
        }else
        {
            $datas = $response;
            return view('dashboard',['datas'=>$datas->json()]);
        }
    }

    public function showDates($id)
    {
        $user = auth()->user();
        $URL = 'http://127.0.0.1:8090/driver/delivery/datadelivery/'.$id;
        $response = Http::withHeaders([
            'x-access-token'=>$user->token
        ])->get($URL);
    
        if ($response->serverError() == True)
        {
            $msg = 'Erro';
            return view('dashboard',['msg'=>$msg]);
        }else{
            $datas = $response[0];
            return view('delivery.show',['datas'=>$datas]);
        }
    }

    public function chooseDelivery($id)
    {
        $user = auth()->user();
        $URL = 'http://127.0.0.1:8090/driver/choosedelivery/'.$id;

        $response = Http::withHeaders([
            'x-access-token'=> $user->token
        ])->get($URL);

        if ($response->serverError() == True){
            $msg = 'error no Servidor';
            return view('dashboard',['msg'=>$msg]);
        }else{
            $msg = 'Agora está entrega pertence a você :)';
            return view('dashboard',['msg'=>$msg]);
        }
    }

    public function getDelivery()
    {
        $user = auth()->user();
        $URL = 'http://127.0.0.1:8090/driver/delivery';
        $dados = Http::withHeaders([
            'x-access-token'=> $user->token
        ])->get($URL);
        if ($dados->serverError() == True)
        {
            $msg = 'error no Servidor';
            return view('dashboard',['msg'=>$msg]);
        }else {
            $deliverys = $dados->json();
            return view('delivery.delivery_driver')->with('deliverys',$deliverys);
        }
    }
    public function renderLocality($id)
    {
        return view('delivery.locality',['id'=>$id]);
    }

    public function sendLocality($id, Request $request)
    {
        $user = auth()->user();
        $URL = 'http://127.0.0.1:8090/driver/delivery/locality/'.$id;
        $locality = $request->locality;

        $response = Http::withHeaders([
            'x-access-token'=> $user->token
        ])->post($URL,['locality'=>$locality]);

        if ($response->serverError() == True){
            $msg =  'error no Servidor';
            return view('delivery.locality',['msg'=>$msg,'id'=>$id]);
        }else{
            $msg =  'atualização de local OK';
            return view('dashboard',['msg'=>$msg]);
        }
    }
    public function endDelivery($id)
    {
        $user = auth()->user();
        $URL = 'http://127.0.0.1:8090/driver/finally/'.$id;
        $response = Http::withHeaders([
            'x-access-token'=> $user->token
        ])->get($URL);
        if ($response->serverError() == True)
        {
            $msg = 'Erro no Servidor';
            return view('dashboard',['msg'=>$msg]);
        }else {
            $msg = 'Entrega Finalizada';
            return view('dashboard',['msg'=>$msg]);
        }
    }

}
