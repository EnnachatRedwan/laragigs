<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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


Route::get('/', function () {
    return view('listings',[
    'title'=>'Listings',
    'listings'=> Listing::all()
    ]);
});

Route::get('/listings/{listing}',function(Listing $listing){
    return view('listing',[
        'listing'=> $listing
    ]);
});