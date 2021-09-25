<?php

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\GoogleLogsController;
use App\Http\Controllers\flutterwaveController;

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
Route::get('/', function(){
    $data=[
        'Status'=>true,
        'Information'=>"Working Properly!"
    ];
    return $data;
});


//google Auth routes
Route::get('/google', [GoogleLogsController::class,'getGoogleData']);
Route::get('/callback', [GoogleLogsController::class,'handleProviderCallback']);
