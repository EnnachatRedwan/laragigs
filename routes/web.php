<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


// Route::get('/hello',function(){
//     return response('<h1>Hello world</h1>',404)->header('content-type','text/plain');
// });

// Route::get('/post/{id}',function($id){
//     return response('<h1>Post number '.$id.'</h1>');
// });

// Route::get('/search',function(Request $request){
//     return response('<h1>'.$request->name.' '.$request->city.'</h1>');
// });


Route::get('/',[ListingController::class,'index'])->name('home');

Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

Route::post('/listings/store',[ListingController::class,'store'])->middleware('auth');

Route::get('/manage/listings',[ListingController::class,'manage'])->middleware('auth');

Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

Route::get('/listings/{listing}',[ListingController::class,'show']);

Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/register',[UserController::class,'store'])->middleware('guest');

Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate',[UserController::class,'authenticate'])->middleware('guest');