<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //gauni visus reikalingus inputs
        $input =  $request->only('answer_text', 'is_correct', 'question_text', 'type', 'category');

        //save question
        $question = new Question();
        $question -> question_text = $input['question_text'];
        $question -> type_id = $input['type'];
        $question -> category_id = $input['category'];
        $question -> user_id = $request->user()->id;
        $question -> save();
        
        for ($i = 0; $i < count($input['answer_text']); $i++){ //ciklas suksis, kiek atsakymu yra
            $answer = new Answer();
            $answer -> answer_text = $input['answer_text'][$i];

            foreach($input['is_correct'] as $a){
                if ($i == $a){
                    $answer -> is_correct = 1;
                }
            }
            $answer -> question_id = $question->id; //is katik sukurto q
            $answer -> save();
        }

        return redirect()->back();
    }
}
