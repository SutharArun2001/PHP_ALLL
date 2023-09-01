<?php

use Illuminate\Support\Facades\Route;
use App\Exceptions\pageNotFoundException;
use Illuminate\Http\Request;


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
    // Log::info('heelo this');
    // try {
        // throw new pageNotFoundException(message: 'page nost available.');
        return view('form.sign');
    // } catch (\Exception $th) {
        //     report(pageNotFoundException::class);
        //     // report($th);

        // throw_if($th ,pageNotFoundException::class , "page not available." );
    // }
});
Route::post('login', function (Request $request) {
    $username = $request->username;
    $password = $request->password;
    $data = compact('username', 'password');
    throw new pageNotFoundException(message: 'login page not available.');
    // try {
    return view('form.login')->with($data);
    // } catch (\Exception $th) {

    // // report(pageNotFoundException::class);
    // report($th);
    // return false;

    // throw_if($th ,pageNotFoundException::class , "page not available." );
    // }
})->withoutMiddleware(['csrf_token']);