<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\ValidateController;
use App\Http\Service\DemoService;
use Mockery\ExpectsHigherOrderMessage;


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


// -------------- For Packages ---------------

// Route::get('calculate',function(){
//     echo "This is from package";
// });
// Route::get('/', function(DemoService $request){
//     // echo $request->test();
//         dd($request);
// });
// Route::get('/', function(Request $request){
//     dd($request);
// });
// Route::get('/', function(DemoService $d){
//     // $d->test();
//     dd($d->test());
// });
// Route::get('/', function(Request $request){
//     print_r(dd($request));
// });
// Route::get('/service', [ValidateController:  :class, 'service']);

// Route::group(["middleware" => "tokenCheck"], function () {
    Route::get('/login', [ValidateController::class, 'loginHome'])->name('loginhome');
    Route::post('/login', [ValidateController::class, 'login'])->name('loginuser');
    Route::post('/register', [ValidateController::class, 'store']);
    Route::get('/register', [ValidateController::class, 'create'])->name('create');
// });
// Route::group(["middleware" => "auth"], function () {
    Route::get('/', [ValidateController::class, 'view']);
    Route::get('table', [ValidateController::class, 'view'])->name('table');
    Route::get('/delete/{id}', [ValidateController::class, 'delete'])->name('rowdelete');
    Route::get('/registerUpdate/edit/{id}', [ValidateController::class, 'edit'])->name('rowedit');
    Route::post('/registerUpdate/update/{id}', [ValidateController::class, 'update'])->name('rowupdate');
    Route::get('/logout', [ValidateController::class, 'logout']);
// });

    Route::get('/home', function (){
        return view('home');
    });

Route::resource('student',ValidateController::class);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');