<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{

    public function quiz(){ //paimami klausimai is db, eiliuojami su datos seed ir pateikiami po viena
    	$questions = Question::with('answers')->inRandomOrder(date('Ymd'))->paginate(1);
        return view('game.question', ['questions' => $questions]);
    }

    public function getseed(){
        return view('game.seed');
    }

    public function getcategory(){
        $categories = Category::withCount('question')->having('question_count', '>', 0)->orderBy('id', 'desc')->get();
        return view('game.category', ['categories' => $categories]);
    }

    public function seedquiz(Request $request){ //paimami klausimai is db, eiliuojami pagal vartotojo seed ir pateikiami po viena
        if(null !== session('seed')){}
        else{
            $seed = '"' . $request->input('seed') . '"';
            $request->session()->put('seed', $seed);
        }
        
        $questions = Question::with('answers')->inRandomOrder($request->session()->get('seed'))->paginate(1);
        return view('game.question', ['questions' => $questions]);
    }

    public function categoryquiz(Request $request){ //paimami klausimai is db, eiliuojami su datos seed ir pateikiami po viena
        if(null !== session('category')){}
        else{
            $result_explode = explode('|', $request->input('category'));
            $category = $result_explode[0];
            $categoryname = $result_explode[1];
            //$category = trim($category, '"');
            $request->session()->put('category', $category);
            $request->session()->put('categoryname', $categoryname);

        }

        $questions = Question::with('answers')->where('category_id', session('category'))->inRandomOrder(date('Ymd'))->paginate(1);
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
            if(null !== session('seed')){
                $user = User::findOrFail($user);
                DB::table('users')->where('id', auth()->user()->id)->increment('games_played');
                return view('game.end', ['user' => $user, 'gamexp' => $request->session()->pull('gamexp'), 'gamescore' => $request->session()->pull('gamescore'), 'seed' => $request->session()->pull('seed')]); //jei daugiau klausimu nera, einama i zaidimo pabaigos view
            }
            else if(null !== session('category')){
                $user = User::findOrFail($user);
                DB::table('users')->where('id', auth()->user()->id)->increment('games_played');
                return view('game.end', ['user' => $user, 'gamexp' => $request->session()->pull('gamexp'), 'gamescore' => $request->session()->pull('gamescore'), 'category' => $request->session()->pull('category'), 'categoryname' => $request->session()->pull('categoryname')]); //jei daugiau klausimu nera, einama i zaidimo pabaigos view
            }
            else{
                $user = User::findOrFail($user);
                DB::table('users')->where('id', auth()->user()->id)->increment('games_played');
                return view('game.end', ['user' => $user, 'gamexp' => $request->session()->pull('gamexp'), 'gamescore' => $request->session()->pull('gamescore')]); //jei daugiau klausimu nera, einama i zaidimo pabaigos view
            }
            
        }
    }     
}
