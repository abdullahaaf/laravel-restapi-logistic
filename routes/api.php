<?php

use App\Http\Controllers\PackageController;
use App\Http\Middleware\CheckApiToken;
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

Route::middleware(CheckApiToken::class)->group(function () {
    Route::resource('packages', PackageController::class);
    Route::patch('kolidata/{customercode}', 'App\Http\Controllers\PackageController@addKoliData');
});
