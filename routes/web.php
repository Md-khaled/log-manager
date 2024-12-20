<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-profile', function () {
    return resolve(\App\Http\Controllers\UserController::class)->userProfile();
});
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware('incoming-request-log');
