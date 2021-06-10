<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SearchFileController;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

Auth::routes();

Route::post('/registernormal', [AuthController::class, 'register']);
Route::post('/logoutnormal', [AuthController::class, 'logout']);

