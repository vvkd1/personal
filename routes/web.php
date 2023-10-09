<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
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


Route::get('/add', function () {
    return view('user_form');
})->middleware(Authenticate::class);


Route::resource('users', CompanyController::class);

Route::post('/add', [StudentController::class, 'store'])->name('store-user')->middleware(Authenticate::class);

Route::get('/display', [StudentController::class, 'show'])->middleware(Authenticate::class)->name('display');


Route::get('/update-user/{id}', [StudentController::class, 'edit'])->name('update-user')->middleware(Authenticate::class);

Route::put('/update-user/{id}', [StudentController::class, 'update'])->name('update-user')->middleware(Authenticate::class);

Route::get('/delete/{delete_id}', [StudentController::class, 'destroyUser']);


Route::get('/export', [StudentController::class, 'exportExcel'])->name('export')->middleware(Authenticate::class);



Route::get('/User_Login', function () {
    return view('User_Login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\StudentController::class, 'show'])->middleware(Authenticate::class);

// Route::any('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

// ----product----

Route::get('/add-product', function () {
    return view('addProduct');
});

Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->name('addProduct')->middleware(Authenticate::class);

Route::get('/product-display', [App\Http\Controllers\ProductController::class, 'showproduct'])->name('product-display')->middleware(Authenticate::class);

Route::get('/update-Product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('update-Product')->middleware(Authenticate::class);

Route::post('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct']);


Route::get('/delete-Product/{id}', [App\Http\Controllers\ProductController::class, 'destroyProduct'])->name('delete-Product');

// ----role----

Route::get('/role-add', function () {
    return view('addRole');
});

Route::post('/add-role', [App\Http\Controllers\RolesController::class, 'store']);
Route::get('/add-role', [App\Http\Controllers\RolesController::class, 'showrole']);



