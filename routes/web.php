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

Route::get('/book', [BukuController::class,'index'])->name('books.index');

Route::get('/book/{id}/edit', [BukuController::class,'edit'])->name('books.edit');

Route::put('/book/{id}', [BukuController::class,'update'])->name('books.update');

Route::delete('/book/{id}', [BukuController::class,'destroy'])->name('books.destroy');