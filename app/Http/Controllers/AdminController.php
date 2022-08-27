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
        $categories = DB::table('categories')->orderByDesc('id')->get();
        $types = DB::table('types')->orderByDesc('id')->get();
        $users = User::withCount(['questions'])->get();
        $questions = Question::with('answers')
            ->join('users', 'questions.user_id', 'users.id')
            ->join('types', 'questions.type_id', 'types.id')
            ->join('categories', 'questions.category_id', 'categories.id')
            ->select('questions.*', 'users.name as creator', 'types.name as type', 'categories.name as category')
            ->get();
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
        //gaunu visus buvusius answers
        $data = DB::table('answers')->where('question_id', '=', $id)->get(); 
        $answers_old = json_decode(json_encode($data), true);

        //gaunu visa input
        $input = $request->all();

        for ($i = 0; $i < count($input['answer_text']); $i++) { //ciklas suksis, kiek ats yra
            
            $answer = Answer::findOrFail($answers_old[$i]['id']);

            //update answer_text
            if ( strcmp($input['answer_text'][$i], $answers_old[$i]['answer_text'])  !== 0 ){
                $answer -> answer_text = $input['answer_text'][$i];
            }

            $answer -> save();
        }

        //update is_correct
        for ($i = 0; $i < count($answers_old); $i++){
            $answer = Answer::findOrFail($answers_old[$i]['id']);

            if ( count(array_keys($input['is_correct'], $answer->id)) === 2 ){
                $answer->is_correct = 1;
            } else {
                $answer->is_correct = 0;
            }

            $answer -> save();
        }
 
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
