<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminKategoriControler;
use App\Http\Controllers\AdminUserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'dologin']);
Route::get('logout', [AdminAuthController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layout.wrapper', $data);
});
route::prefix('/admin')->group(function (){
Route::get('/dashboard', function(){
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layout.wrapper', $data);

})->middleware('auth');
Route::resource('/kategori', AdminKategoriControler::class);
    Route::resource('/user',AdminUserController::class);
});

