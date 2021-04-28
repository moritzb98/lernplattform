<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SecretController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Rooms
    Route::post('/room/create', [RoomController::class, 'create']);
    Route::post('/room/update', [RoomController::class, 'update']);
    Route::post('/room/delete', [RoomController::class, 'delete']);
    Route::post('/room/join', [RoomController::class, 'joinRoom']);
    Route::post('/room/leave', [RoomController::class, 'leaveRoom']);
    Route::get('/rooms', [RoomController::class, 'getAllRooms']);
    Route::post('/room', [RoomController::class, 'getRoom']);
});
