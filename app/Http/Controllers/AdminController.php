<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Type;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        $types = Type::all();
        $users = User::withCount(['questions'])->get();
        /*$questions = Question::withWhereHas('answers', function ($query){
            $query->where('is_correct', '=', 1);
        })*/
        $questions = Question::with('answers')
            ->join('users', 'questions.user_id', 'users.id')
            ->join('types', 'questions.type_id', 'types.id')
            ->join('categories', 'questions.category_id', 'categories.id')
            ->select('questions.*', 'users.name as creator', 'types.name as type', 'categories.name as category')
            ->get();
        //return $questions;
        return view('admin.admin', compact('categories', 'users', 'questions', 'types'));
    }

    public function update_question(Request $request, $id){
        $question = Question::find($id);
        $input = $request->all();

        if(isset($input['is_active'])){
            $question->is_active = '1';
        } else {
            $question->is_active = '0';
        }
        $question -> category_id = $input['category_id'];
        $question->fill($input)->save();
 
        return redirect()->back();
    }

    public function update_answer(Request $request, $id){
        $answers = DB::table('answers')->where('question_id', '=', $id)->get();

        $input = $request->all();
        
        $a = json_decode(json_encode($answers), true);

        for ($i = 0; $i < count($input['answer_text']); $i++){ //ciklas suksis, kiek atsakymu yra

            if ($input['answer_text'][$i] !== $a[$i]['answer_text']  ){
                $answer = Answer::findOrFail($a[$i]['id']);
                $answer -> answer_text = $input['answer_text'][$i];
                $answer -> save();
            }

            /*
            if(isset($input['is_correct'])){
                foreach($input['is_correct'] as $a){ //jei atsakymo arr numeris sutampa su checkbox reiksme - iraso kaip teisinga
                    if ($i == $a){
                        $answer -> is_correct = 1;
                    }
                }
            }*/
            //$answer -> save();
        }
        //return compact('input', 'a');
 
        return redirect()->back();
    }
 

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string',
        ]);
        $category = new Category();
        $category -> name = $request->input('name');

        try {
            $category -> save();
            return redirect('/admin-view#categories/');
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return back()->with('error', 'Houston, we have a duplicate entry problem');
            }else {
                return back()->with('error', 'something went wrong');
            }
        }
    }

    public function destroy_category($id)
    {
        $category = Category::findOrFail($id);
        if($id != 1){
            Question::where('category_id', $id)->update((['category_id'=>'1']));
            $category->delete();
        }
        return redirect('/admin-view#categories/');
    }

    public function destroy_question($id)
    {
        $question = Question::findOrFail($id);
        Answer::where('question_id', $question->id)->delete();
        $question->delete();
        return redirect()->back();
    }
}
