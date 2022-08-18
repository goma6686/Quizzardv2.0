<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Category;
use App\Models\Answer;
use App\Models\Type;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        //gauni visus inputs
        //$input = $request->all();
        return Request::only('answer_text', 'is_correct');
        return $input;

        //save question
        $question = new Question();
        $question -> question_text = $input['question_text'];
        $question -> type_id = $input['type'];
        $question -> category_id = $input['category'];
        $question -> user_id = $request->user()->id;
        $question -> save();
        
        foreach($input as $key => $value) {
            $answer_text = null;
            $is_correct = null;
            
            //randi answer_text__x value
            if (preg_match('/^answer_text_[0-5]$/', $key)){
                $answer_text = $value;
            }
            //randi is_correct_x value
            if (preg_match('/^is_correct_[0-5]$/', $key)){
                $is_correct = $value;
            }
            //sukuri answer
            if (isset($answer_text)){
                $answer = new Answer();
                $answer -> answer_text = $answer_text;
                if(isset($is_correct)){
                    $answer -> is_correct = $is_correct;
                } //else nereikia, nes default yra false
                $answer -> question_id = $question->id; //is katik sukurto q
                $answer -> save();
            }
        }
        return redirect()->back();
    }
}
