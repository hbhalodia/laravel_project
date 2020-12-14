<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;    //use in larvel 8 for user class else it will not come
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
Route::get('/', function () {
    return view('welcome');
});
/* calling the main home Page */
Route::get('/userHome', function () {
    return view('home');
});

/* defining the user controller  M-V-C  <-- C*/ 
//Route::get('/user','app\Http\Controllers\UserController@index');  --> In laravel 7 

Route::get('/user', [UserController::class, 'index']);      //--> IN laravel 8
Route::post('/upload',[UserController::class,'uploadAvtar']);
//dd($request->all());
    //dd($request->file('image')); //or 
    //dd($request->image);
    //to check if choosed image or not
    //dd($request->hasfile('image'));

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
