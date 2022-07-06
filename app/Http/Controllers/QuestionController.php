<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Answer;
use App\Models\Type;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        $types = Type::all();
        return view('layouts.create-question', ['categories' => $categories, 'types' => $types]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'question_text' => 'required',
            'type' => 'required',
            'category' => 'required',
        ]);
        $input = $request->all();

        //save question
        $question = new Question();
        $question -> question_text = $input['question_text'];
        $question -> type_id = $input['type'];
        $question -> category_id = $input['category'];
        $question -> user_id = $request->user()->id;
        //$question -> save();

        //is visu gautu inputu atrinkti answers
        foreach($input as $key => $value) {
            if (preg_match('/^answer_text_[0-5]$/', $key)){
                $answer = new Answer();
                $answer -> answer_text = $value;
                $answer -> question_id = $question->id; //is katik sukurto q
                $answer -> save();

                $id = $answer->id;
            } 
            //TO DO
            if (preg_match('/^is_correct_[0-5]$/', $key)){
                //Answer::where('id', $answer->id)->update(['is_correct'=>'1']);
            } //else nereikia, nes default reiksme 0
        }
        return redirect()->back();
    }
}
