<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        $users = User::withCount(['questions'])->get();
        $questions = Question::withWhereHas('answers', function ($query){
            $query->where('is_correct', '=', 1);
        })
            ->join('users', 'questions.user_id', 'users.id')
            ->join('types', 'questions.type_id', 'types.id')
            ->join('categories', 'questions.category_id', 'categories.id')
            ->select('questions.*', 'users.name as creator', 'types.name as type', 'categories.name as category')
            ->get();
        //return $questions;
        return view('admin.admin', compact('categories', 'users', 'questions'));
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

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($id != 1){
            Question::where('category_id', $id)->update((['category_id'=>'1']));
            $category->delete();
        }
        return redirect('/admin-view#categories/');
    }
}
