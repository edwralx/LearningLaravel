<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CustomersController;
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

 /* Route::get('/', function () {
    return view('welcome');
}); */

// Route::view('/', 'welcome');
Route::view('/', 'home');
// Route::view('/about', 'about')->middleware('test');
Route::view('/about', 'about');

Route::get('/contact', [ContactFormController::class, 'create']);
Route::post('/contact', [ContactFormController::class,'store']);

// Route::view('/contact', 'contact');

/* Route::get('/contact', function () {
    return view('contact');
}); */

// Route::get('/customers', [CustomersController::class, 'index']);
// Route::get('/customers.create', [CustomersController::class, 'create']);
// Route::post('/customers', [CustomersController::class,'store']);
// Route::get('/customers/{customer}', [CustomersController::class, 'show']);
// Route::get('/customers/{customer}/edit', [CustomersController::class, 'edit']);
// Route::patch('/customers/{customer}', [CustomersController::class, 'update']);
// Route::delete('/customers/{customer}', [CustomersController::class, 'destroy']);

Route::resource('customers', CustomersController::class);




/* Route::get('/', function () {
    return "<H1>Welcome to Laravel Training</H1>";
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
