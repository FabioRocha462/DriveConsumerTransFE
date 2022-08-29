<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\TokenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route :: resource ( 'delivery' , DeliveryController ::class)-> middleware ( 'auth' );

Route:: get('/loginserver', [TokenController ::class, 'loginServer'])-> middleware ( 'auth' );
Route:: post('/createtoken', [TokenController ::class, 'createToken'])-> middleware ( 'auth' );

Route::get('/searchdelivery', [DeliveryController ::class, 'searchDelivery'])-> middleware ( 'auth' );
Route::get('/showdatesdelivery/{id}', [DeliveryController:: class, 'showDates'])-> middleware ( 'auth' );
Route::get('/choosedelivery/{id}', [DeliveryController:: class, 'chooseDelivery'])-> middleware ( 'auth' );
Route::get('/getdelivery', [DeliveryController:: class, 'getDelivery'])-> middleware ( 'auth' );
Route::get('/renderlocality/{id}', [DeliveryController:: class, 'renderLocality'])-> middleware ( 'auth' );
Route::get('/sendlocality/{id}',[DeliveryController::class, 'sendLocality'])-> middleware ( 'auth' );
Route::get('/enddelivery/{id}', [DeliveryController:: class, 'endDelivery'])-> middleware ( 'auth' );
