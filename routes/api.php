<?php

use Illuminate\Http\Request;
use App\Message;
use App\Events\MessageSent;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/post',function(){
    $message = new Message();
    $content = request('message');
    $message->content = $content;
    $message->save();
    event(new MessageSent($content));
    return $content;
});
