<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function () {
    return redirect('/login')->with('error', 'Akun tidak ditemukan atau password salah!');
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/book', [BukuController::class,'index']);