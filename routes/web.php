<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;    //use in larvel 8 for user class else it will not come
use App\Http\Controllers\TodoController; 
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
/*all routes for to-do list project */
Route::middleware('auth')->group(function(){
    Route::resource('/todo',TodoController::class);
    Route::put('/todos/{todo}/complete',[TodoController::class,'complete'])->name('todo.complete');
    Route::put('/todos/{todo}/incomplete',[TodoController::class,'incomplete'])->name('todo.incomplete');
});

/*
Route::get('/todos',[TodoController::class, 'index'])->name('todo.index');
Route::get('/todos/create',[TodoController::class,'create'])->name('todo.create');
Route::get('/todos/{todo}/edit',[TodoController::class,'edit'])->name('todo.edit');
*/
/*method post for form submit */
//Route::post('/todos/create',[TodoController::class,'store'])->name('todo.store');
//for updTE TODO list route
/*
Route::patch('/todos/{todo}/update',[TodoController::class,'update'])->name('todo.update');
Route::put('/todos/{todo}/complete',[TodoController::class,'complete'])->name('todo.complete');
Route::put('/todos/{todo}/incomplete',[TodoController::class,'incomplete'])->name('todo.incomplete');
Route::delete('/todos/{todo}/delete',[TodoController::class,'destroy'])->name('todo.destroy');
*/
/*route for todo-list project complete*/


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
