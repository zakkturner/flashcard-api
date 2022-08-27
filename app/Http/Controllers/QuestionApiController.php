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
}
