<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Type;
use App\Models\Category;

class UserController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        //$count = $questions->where('is_active', '=', 1)->count();
        return view('profile', ['user' => $user]);
    }

    public function leaderboard(){
        $users = DB::table('users')->orderByDesc('xp')->limit(10)->get();
        return view('leaderboard', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', ['user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin-view#users/');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user -> name = request('name');
        $user -> email = request('email');

        if(request('is_active') != NULL){
            $user->is_active = '1';
        } else {
            $user->is_active = '0';
        }

        if(request('is_admin') != NULL){
            $user->is_admin = '1';
        } else {
            $user->is_admin = '0';
        }
        $user->save();

        return redirect()->back();
    }
}
