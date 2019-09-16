<?php

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
use App\Message;
use App\Events\MessageSent;
// Return index page with the Vue component we will create soon
Route::get('/', function () {
    return view('welcome');
});

//Return all messages that will populate our chat messages
Route::get('/getAll',function(){
    $messages = Message::take(200)->pluck('content');
    return $messages;
});

//Allows us to post new message
