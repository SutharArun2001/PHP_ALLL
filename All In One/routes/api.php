<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiControlller;
use App\Http\Resources\FruitCollection;
use App\Http\Resources\FruitsResource;
use App\Models\Fruits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('fruits/', [ApiController::class, 'allFruits'])->name('allFruits');

Route::get('findFruits/{name:name}', [ApiController::class, 'findFruits'])->name('findFruits');
Route::get('fruits/{id}', [ApiController::class, 'addFavourite'])->name('addFavourite')->where('id','[0-9]+');

Route::get('favourite', [ApiController::class, 'allFavourites'])->name('allFavourites')->middleware('trowttle:fruit_api');