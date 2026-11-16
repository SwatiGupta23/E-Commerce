<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('login');
})->middleware('userauth');

Route::post('/login',[UserController::class,"login"]);

Route::get('/',[ProductController::class,"index"]);

Route::get('detail/{id}',[ProductController::class,"detail"]);

Route::get('search',[ProductController::class,"search"]);

Route::post('/add_to_cart',[ProductController::class,"addToCart"]);

Route::get('/cartlist',[ProductController::class,"cartList"]);

Route::get('/removecart/{id}',[ProductController::class,"deletecart"]);

Route::get('/ordernow/',[ProductController::class,"ordernow"]);

Route::post('/orderplace',[ProductController::class,"orderplace"]);

Route::get('/myorder',[ProductController::class,"myOrder"]);

Route::get('/logout',function(){
    Session::forget('user');
    return redirect('/login');
});
Route::get('/register',function(){
    return view('register');
});