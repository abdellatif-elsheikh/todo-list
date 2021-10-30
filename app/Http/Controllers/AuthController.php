<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth/register');
    }
    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female'
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'full_name' => "$request->first_name $request->last_name",
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender
        ]);

        Auth::login($user);
        return redirect(url('/'));

    }

    public function loginForm(){
        return view('auth/login');
    }

    public function login(Request $request){
        $isLogged = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if(!$isLogged){
            $request->session()->flash('error', 'Incorrect username or password.');
            return back()->withInput();
        }
        return redirect(url('/'));
    }

    public function logout(){
        Auth::logout();
        return redirect(url('login'));
    }
}
