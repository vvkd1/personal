<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;


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

Route::get('/add', [StudentController::class, 'sendRoles'])->middleware(Authenticate::class);


Route::get('/display', [StudentController::class, 'show'])->middleware(Authenticate::class)->name('display');


Route::get('/update-user/{id}', [StudentController::class, 'edit'])->name('update-user')->middleware(Authenticate::class);

Route::put('/update-user/{id}', [StudentController::class, 'update'])->name('update-user')->middleware(Authenticate::class);

Route::get('/delete/{delete_id}', [StudentController::class, 'destroyUser']);


Route::get('/export', [StudentController::class, 'exportExcel'])->name('export')->middleware(Authenticate::class);



Route::get('/User_Login', function () {
    return view('User_Login');
})->middleware(Authenticate::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\StudentController::class, 'show'])->middleware(Authenticate::class);

// Route::any('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

// ----product----

Route::get('/add-product', function () {
    return view('addProduct');
})->middleware(Authenticate::class);

Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->name('addProduct')->middleware(Authenticate::class);

Route::get('/product-display', [App\Http\Controllers\ProductController::class, 'showproduct'])->name('product-display')->middleware(Authenticate::class);

Route::get('/update-Product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('update-Product')->middleware(Authenticate::class);

Route::post('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct']);


Route::get('/delete-Product/{id}', [App\Http\Controllers\ProductController::class, 'destroyProduct'])->name('delete-Product')->middleware(Authenticate::class);

// ----role----

Route::get('/addRole', function () {
    return view('addRole');
})->middleware(Authenticate::class);

Route::get('/roleDisplay', function () {

    return view('roleDisplay');
})->middleware(Authenticate::class);

Route::post('/addRole', [App\Http\Controllers\RolesController::class, 'store'])->middleware(Authenticate::class);;
Route::get('/roleDisplay', [App\Http\Controllers\RolesController::class, 'show']);
Route::get('/deleteRole/{id}', [RolesController::class, 'destroyRole'])->name('deleteRole')->middleware(Authenticate::class);



Route::get('/RolePermission', function () {
    return view('permission');
})->middleware(Authenticate::class);


Route::post('/storeRole', [App\Http\Controllers\RolesController::class, 'storeRole'])->middleware(Authenticate::class);

Route::get('showRoles', [App\Http\Controllers\RolesController::class, 'showRole'])->middleware(Authenticate::class);

Route::get('/delete-role/{id}', [App\Http\Controllers\RolesController::class, 'destroyRole'])->middleware(Authenticate::class);

Route::get('/edit-role/{id}', [App\Http\Controllers\RolesController::class, 'editRole'])->middleware(Authenticate::class);

Route::post('/update-role/{id}', [App\Http\Controllers\RolesController::class, 'updateRole'])->middleware(Authenticate::class);


Route::get('/addRoles', function () {
    return view('addRoles');
})->middleware(Authenticate::class);


//permission


Route::post('/storePermission', [App\Http\Controllers\PermissionController::class, 'storePermission']);

Route::get('/showPermission', [App\Http\Controllers\PermissionController::class, 'showPermission']);

Route::get('/edit-permission/{id}', [App\Http\Controllers\PermissionController::class, 'editPermission']);

Route::post('/update-permission/{id}', [App\Http\Controllers\PermissionController::class, 'updatePermission']);

Route::get('/delete-permission/{id}', [App\Http\Controllers\PermissionController::class, 'destroyPermission']);


Route::get('/addPermission', function () {
    return view('addPermission');
});
