<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Events\MessageSent;

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

Route::get('/chat', function () {
    return view('chat');
});

Route::post('/send-message', function (Request $request) {
    event(new MessageSent($request->username, $request->message));
    return ['status' => 'Message Sent!'];
});
