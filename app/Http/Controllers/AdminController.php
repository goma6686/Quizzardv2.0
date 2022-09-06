<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
<<<<<<< HEAD
use App\Models\Type;
use App\Models\Question;
use App\Models\Answer;
=======
>>>>>>> 3435db419e1b57988185f5d2060c78375189396d
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request){
<<<<<<< HEAD
        $categories = DB::table('categories')->orderBy('id', 'asc')->get();//'Unknown' is not shown as it should always be in db (in blade, skips first)
        $types = DB::table('types')->orderByDesc('id')->get();
        $users = User::withCount(['questions'])->get();

        $questions = Question::with('answers')
            ->join('users', 'questions.user_id', 'users.id')
            ->join('types', 'questions.type_id', 'types.id')
            ->join('categories', 'questions.category_id', 'categories.id')
            ->select('questions.*', 'users.name as creator', 'types.name as type', 'categories.name as category')
            ->where('is_approved', '=', '1')
            ->get();

        $approve = Question::with('answers')
        ->join('users', 'questions.user_id', 'users.id')
        ->join('types', 'questions.type_id', 'types.id')
        ->join('categories', 'questions.category_id', 'categories.id')
        ->select('questions.*', 'users.name as creator', 'types.name as type', 'categories.name as category')
        ->where('is_approved', '=', '0')
        ->get();
        $count = $approve->count();
        return view('admin.admin', compact('categories', 'users', 'questions', 'types', 'approve', 'count'));
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
=======

        //grazina kiek user turi sukures questions. Nzn ar reik
        //$data = User::withCount(['questions'])->get(); 
        $categories = Category::all();
        $users = User::all();
        return view('admin.admin', ['categories' => $categories, 'users' => $users]);
>>>>>>> 3435db419e1b57988185f5d2060c78375189396d
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
            return redirect()->back();
        
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
        if($id != 1){ //nes id1 -> Unknown should always be available
            Question::where('category_id', $id)->update((['category_id'=>'1']));
            $category->delete();
        }
        return redirect()->back();
    }
}
