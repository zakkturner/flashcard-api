<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Http\Request;

class QuestionApiController extends Controller
{
    //
    public function index(){


        return Question::all();
    }

    public function add(){
        request()->validate([
            'question' => 'required',
            'answer' => 'required',

        ]);
        return Question::create([
            'question' => request('question'),
            'answer' => request('answer'),
            'level' => null,

        ]);
    }
    public function update(Question $question ){
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

    }

    public function delete(Question $question){
        $success = $question->delete();
        return [
         'success' => $success
     ];
    }

}
