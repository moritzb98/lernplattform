<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SearchFileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\API\AccessTokenController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Karteikartensetcontroller;
use App\Http\Controllers\Karteikartencontroller;

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

Route::middleware('auth:sanctum')->get('/authuser', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    // User
    Route::post('/user', [AuthController::class, 'getUser']);

    // Rooms
    Route::post('/room/create', [RoomController::class, 'create']);
    Route::post('/room/update', [RoomController::class, 'update']);
    Route::post('/room/get/{roomid}', [RoomController::class, 'getRoom']);
    Route::post('/room/delete/{id}', [RoomController::class, 'delete']);
    Route::post('/room/join/{roomid}', [RoomController::class, 'joinRoom']);
    Route::post('/room/leave/{roomid}', [RoomController::class, 'leaveRoom']);
    Route::get('/rooms', [RoomController::class, 'getAllRooms']);
    Route::get('/getmyroom', [RoomController::class, 'getMyRooms']);
    Route::post('/room/users', [RoomController::class, 'getUsersInRoom']);
    Route::get('/room/userIsIn', [RoomController::class, 'getRoomsUserIsIn']);

    //Uploads + Files
    Route::get('/getFiles', [FileController::class, 'index']);
    Route::post('/upload', [FileController::class, 'upload'])->name('upload');
    Route::get('/getMyFiles', [FileController::class, 'showUserFiles']);
    Route::get('/upload/{id}', [FileController::class, 'showFile']);
    Route::post('/files/showInCollection', [FileController::class, 'showFilesInCollection']);
    Route::post('/files/update', [FileController::class, 'update']);
    Route::post('/files/showCollectionsToFile', [FileController::class, 'showCollectionsToFile']);
    Route::post('/files/delete', [FileController::class, 'delete']);

    //Chat
    Route::get('/chat', function () {
        return Inertia\Inertia::render('Chat/container');
    })->name('chat');

    Route::get('/chat/rooms' , [ChatController::class, 'rooms']);
    Route::get('chat/room/{roomId}/messages', [ChatController::class, 'messages']);
    Route::post('chat/room/{roomId}/message', [ChatController::class, 'newMessage']);

    //Collection
    Route::post('/collection/create' , [CollectionController::class, 'create']);
    Route::post('/collection/addFile' , [CollectionController::class, 'addFile']);
    Route::get('/collection/show' , [CollectionController::class, 'showMyCollections']);
    Route::get('/collection/show/{id}' , [CollectionController::class, 'showCollectionDetails']);

    //Search
    Route::get('/search/upload', [SearchFileController::class, 'index']);

    //Videochat
    Route::get('access_token', [AccessTokenController::class, 'generate_token']);

    //Quiz
    Route::get('categories/quiz', [QuizController::class, 'getAllCategoriesQuizzesAreIn']);
    Route::get('quiz/{category}', [QuizController::class, 'getQuiz']);
    Route::get('quiz/questions/{quizid}', [QuizController::class, 'getQuestion']);
    Route::get('quiz/id/{quizid}', [QuizController::class, 'getQuizWithId']);
    Route::post('quiz/saveResult', [QuizController::class, 'saveResult']);
    Route::post('quiz/id/result', [QuizController::class, 'getResult']);

    //Badges
    Route::get('badges', [QuizController::class, 'getBadges']);

    // Category
    Route::get('categories', [CategoryController::class, 'getAll']);
    Route::get('categories/{id}', [CategoryController::class, 'getCategory']);

    //Karteikartensets
    Route::get('karteikartensets', [Karteikartensetcontroller::class, 'getSets']);
    Route::post('karteikartensets/create', [Karteikartensetcontroller::class, 'create']);
    Route::post('karteikarten/create', [Karteikartencontroller::class, 'create']);
    Route::get('karteikartenset/{karteikartenid}', [Karteikartensetcontroller::class, 'getSet']);
});

// Interests - without Middleware
Route::get('/interests/getall' , [InterestController::class, 'getAllInterest']);
Route::post('/interests/send' , [InterestController::class, 'sendToUser']);







