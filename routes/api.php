<?php

use App\Models\Question;
use App\Http\Controllers\QuestionApiController;
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


Route::get("/questions", [QuestionApiController::class, 'index']);


Route::post('/questions', [QuestionApiController::class, 'add']);


Route::put('/questions/{question}',[QuestionApiController::class, 'update']);

Route::delete('/questions/{question}',[QuestionApiController::class, 'delete']);
