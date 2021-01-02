<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->intended ('dashboard');
        }
        return view('auth.login');   
    }

    // Login Authentication
    public function authenticate(LoginRequest $request)
    {
        if(Auth::attempt(
        $request->only('email' , 'password'),
        $request->filled('remember')
        )){
            Alert::success('You Are Successfully Logged In!');
           return redirect()->intended('/dashboard');
        }else{
             return back()->withErrors([
            'password' => 'Password does not match our records.',
        ]);
        }
    }

    //Logout Authentication
     public function logout()
    {
         Auth::logout();
         return redirect()->to('/login');
    }
}