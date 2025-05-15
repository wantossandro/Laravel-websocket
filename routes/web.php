<?php

use App\Events\CountdownEvent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/xiaoping', function () {
    $data = [
        'status' => 'Success',
        'message' => 'Selamat datang',
    ];
    broadcast(new CountdownEvent($data));
    return;
});
