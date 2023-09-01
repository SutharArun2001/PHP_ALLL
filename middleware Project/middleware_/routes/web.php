<?php

use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\mainControlle;
use Illuminate\Support\Facades\Route;
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
// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes(); 
Route::group(["middleware" => "auth"], function () {
    Route::get('/', [mainControlle::class, 'view']);
    // Route::get('/', [mainControlle::class, 'view'])->middleware([EnsureTokenIsValid::class]);
    Route::get('/login', [mainControlle::class, 'loginHome']);
    Route::post('/login', [mainControlle::class, 'login'])->name('login.user');
    
    Route::post('/register', [mainControlle::class, 'store']);
    
    Route::get('/register', [mainControlle::class, 'create'])->name('create');
    
    Route::get('/table', [mainControlle::class, 'view']);
    
    Route::get('/delete/{id}', [mainControlle::class, 'delete'])->name('row.delete');
    
    Route::get('registerUpdate/edit/{id}', [mainControlle::class, 'edit'])->name('row.edit');
    
    Route::post('registerUpdate/update/{id}', [mainControlle::class, 'update'])->name('row.update');
    Route::get('/logout', [mainControlle::class, 'logout']);
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');