<?php

namespace App\Http\Controllers\voter;

use App\Models\Voter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:voter');
    // }

    public function create(){
        return view('voterauth.index');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'identity'=> 'required|unique:voters|max:255',
            'name'=>'required',
            'email'=>'required|unique:voters',
            'password'=>'required|confirmed',
            'phone'=> 'required'
        ]);
        $validated['password'] = Hash::make($request->password);

        $voter = Voter::create($validated);
        auth()->login($voter);
        return redirect('/home');
    }

    public function login(){
        return view('voterauth.login');
    }

    public function authenticate(Request $request){
        $validated = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/home');
        }

        // return back();
    }
}
