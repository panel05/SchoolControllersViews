<?php

namespace App\Http\Controllers;

use App\Models\User;
use APP\Models\Task;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = response()->json(User::all());
        return $users;
    }

    public function show($id){
        $user = response() -> json(User::find($id));
        return $user;
    }

    public function destroy($id){
        User::find($id)->delete;
    }

    public function store(Request $request){
        $user = new User();
        $user->names = $request->name;
        $user->email = $request->email;
        $user->save();
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user -> name = $request-> name;
        $user -> email = $request -> email;
        $user->save();
    }

    public function newView(){
        $tasks = Task::all();
        return view('user.new', ['tasks' =>$tasks]);
    }

    public function editView($id){
        $tasks = Task::all();
        $user = User::find($id);
        return view('user.new', ['tasks'=>$tasks, 'user'=>$user]);
    }

    public function listView(){
        $users = User::all();
        return view('user.list', ['users'=>$users]);
    }
}
