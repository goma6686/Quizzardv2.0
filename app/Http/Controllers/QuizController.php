<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function quiz(Request $request){ //paimami klausimai is db, eiliuojami su datos seed ir pateikiami po viena
    	$questions = Question::with('answers')->inRandomOrder(date('Ymd'))->paginate(1);
        return view('game.question', ['questions' => $questions]);
    }
    public function store(Request $request){
    	$id = $request->input('question'); //gaunami pasirinkti atsakymai
        $user = $request->input('user');
    	$next = $request->input('next');
        $ans = $request->input('ans'); 
        if(is_array($ans)){ //jei pasirinkti keli, ju rezultatai sumuojami
            $request->session()->increment('gamescore', $incrementBy = $ans[0]); //zaidimo score didinamas jei i klausima atsakyta teisingai
            $gotxp = array_sum($ans);
        }
        else{ //jei ne, paliekama
            $request->session()->increment('gamescore', $incrementBy = $ans); //zaidimo score didinamas jei i klausima atsakyta teisingai
            $gotxp = $ans;
        }
        if(in_array(date("l"), ["Saturday", "Sunday"])){
            $gotxp = $gotxp * 2; // double xp weekend:)
        }
        $request->session()->increment('gamexp', $incrementBy = $gotxp);
        $currentxp = DB::table('users')->where('id', $user)->value('xp'); //gaunamas naudotojo xp
        $totalxp = $currentxp + $gotxp; //prie esamu xp pridedami gauti
        $added = DB::table('users')->where('id', $user)->update(['xp' => $totalxp]); //atnaujinamas xp kiekis
        if($next != "none"){
            return redirect()->to($next); //einama prie kito klausimo
        }
        else{
            $user = User::findOrFail($user);
            return view('game.end', ['user' => $user, 'gamexp' => $request->session()->pull('gamexp'), 'gamescore' => $request->session()->pull('gamescore')]); //jei daugiau klausimu nera, einama i zaidimo pabaigos view
        }
    }     
}
