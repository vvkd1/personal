<?php

use App\Http\Controllers\StudentController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

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


Route::get('/add' , function(){
    return view('user_form');
})->middleware(Authenticate::class);


 Route::resource('users', CompanyController::class);

 Route::post('/add', [StudentController::class, 'store'])->name('store-user')->middleware(Authenticate::class);

 Route::get('/display', [StudentController::class, 'show'])->middleware(Authenticate::class)->name('display');
 Route::get('/delete-user/{id}', [StudentController::class, 'destroy'])->middleware(Authenticate::class);

 Route::get('/update-user/{id}', [StudentController::class, 'edit'])->middleware(Authenticate::class);
 Route::post('/update-user/{id}', [StudentController::class, 'update'])->name('update-user')->middleware(Authenticate::class);


 Route::get('/User_Login', function () {
    return view('User_Login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\StudentController::class, 'show'])->middleware(Authenticate::class);

// Route::any('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

