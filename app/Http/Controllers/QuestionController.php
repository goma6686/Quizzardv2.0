<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        return view('layouts.create-question', ['categories' => $categories]);
    }
}
