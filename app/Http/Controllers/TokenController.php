<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class TokenController extends Controller
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
    public function loginServer()
    {
        return view('login_Server');
    }
    public function createToken(Request $request){
        $email = $request->email;
        $password = $request->password;

        $URL ='127.0.0.1:8090/driver/login';

        $response = Http::withBasicAuth(
            $email,$password)->get($URL);
        if ($response->serverError() == True)
        {
            $msg = 'Login Inválido no Servidor TransFÉ';
            return view('login_Server',['msg'=>$msg]);
        }else
        {
            $user = auth()->user();
            $userUpdate = User::findOrFail($user->id);
            $userUpdate->token = $response['token'];
            $userUpdate->update();
            return $userUpdate->token;
            $msg = 'Usuário Logado no Servidor TransFÉ';
            return view('login_Server',['msg'=>$msg]);
        }

    }

}
