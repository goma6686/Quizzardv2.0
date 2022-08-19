<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function quiz(Request $request){
    	$questions = Question::with('answers')->inRandomOrder(date('Ymd'))->paginate(1);
        return view('game.question', ['questions' => $questions]);
    }
    public function store(Request $request){
    	$id = $request->input('question');
    	$next = $request->input('next');
        $ans = $request->input('ans'); 
        return redirect()->to($next);
    }     
}
