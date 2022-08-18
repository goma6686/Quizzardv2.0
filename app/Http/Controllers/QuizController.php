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

class QuizController extends Controller
{
    public function quiz(Request $request){
        $questions = Question::with('answers')->inRandomOrder()->simplePaginate(1);
        //return $question;
        return view('game.question', ['questions' => $questions]);
    }
}
