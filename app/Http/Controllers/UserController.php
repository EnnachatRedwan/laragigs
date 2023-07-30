<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>['required','min:3','max:20'],
            'email'=>['required','min:5','max:50','email',Rule::unique('users','email')],
            'password'=>['required','min:8','max:20','confirmed']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        Auth::login($user);

        return redirect('/')->with('message','Account was created successfully');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if(Auth::attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','Welcome back');
        }

        return back()->withErrors(['email'=>'Invalid credintials']);
    }
}
