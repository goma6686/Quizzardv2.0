<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function show($id){
        $user = User::withCount(['questions'])->where('id', '=', $id)->first();

        $test = DB::table('users')->orderByDesc('xp')->get();// in prog

        $index = $this->findLeaderboardIndex($id, $test);

        return view('profile', ['user' => $user, 'index' => $index]);
    }

    public function findLeaderboardIndex($id, $arr){
        foreach(json_decode($arr, true) as $key => $object) {
            if($object['id'] == $id){
                return $key+1;
            }
        }
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

    public function update($id)
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
