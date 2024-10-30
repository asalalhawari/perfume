<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
 


/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php


Route::resource('categories', CategoryController::class);
// routes/web.php


Route::resource('brands', BrandController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
// Route::resource('order_items', OrderItemController::class);

Route::get('/dashboard', function () {
    return view('layouts.master'); 
})->name('dashboard');


// Route::get('/test',function() {
//     return view('lay')
// });
// Route::controller(AuthController::class)->group(function () {
//     Route::get('register', 'register')->name('register');
//     Route::post('register', 'registerSave')->name('register.save');
 
//     Route::get('login', 'login')->name('login');
//     Route::post('login', 'loginAction')->name('login.action');
 
//     Route::get('logout', 'logout')->middleware('auth')->name('logout');
// });


// Route::get('/landing', function () {
//     return view('landing');
// });

Route::get('/a', function () {
    return view('home');  
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('landingPage' , function(){
    return view('landing');
});