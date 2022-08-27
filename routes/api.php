<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Question;

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


Route::get("/questions", function(){
    return Question::all();
});


Route::post('/questions', function(){
    request()->validate([
        'question' => 'required',
        'answer' => 'required',

    ]);
    return Question::create([
        'question' => request('question'),
        'answer' => request('answer'),
        'level' => null,

    ]
);
});


Route::put('/questions/{question}',function(Question $question){
    request()->validate([
        'question' => 'required',
        'answer' => 'required',

    ]);

  $success =  $question->update([
        'question' => request('question'),
        'answer' => request('answer'),
    ]);

    return [
        'success' => $success
    ];
});

Route::delete('/questions/{question}',function(Question $question){
   $success = $question->delete();
   return [
    'success' => $success
];
});
