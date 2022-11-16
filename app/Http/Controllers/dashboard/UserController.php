<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('dashboard.admin.users.index',compact('users'));
    }

    public function create(){
        return view('dashboard.admin.users.create');
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/home/users');
    }

    public function edit(User $user){
        return view('dashboard.admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $user->update($validated);
        return back(); 
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('/home/users');
    }
}
