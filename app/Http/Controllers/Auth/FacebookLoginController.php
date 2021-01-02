<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class FacebookLoginController extends Controller
{
    
    //Facebook Authentication
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        
        $old_user = Admin::where('provider_id' , $user->id)->first();

        if($old_user){

           Auth::login($old_user);
            Alert::success('You Are Successfully Logged In!');
           return redirect()->intended('/dashboard');

        }else{
            if(isset(Admin::where('email' , $user->email)->first()->email)){
                    Alert::error("Please Try Another Account!");
                    return redirect()->intended('/login');
                       }else{                        
                                $new_user                               =   new Admin();
                                $new_user->name                   =  $user->name ;
                                $new_user->email                   =   $user->email ;
                                $new_user->provider_id         =   $user->id;
                                $new_user->avatar_link          =   $user->avatar_original ;
                                $new_user->profile_link         =   $user->profileUrl;
                                $new_user->email_verified_at =     now();
                                $new_user->_token                   =   $user->token;
                                if($new_user->save()){
                                Auth::login($new_user);
                                Alert::success('You Are Successfully Logged In!');
                            return redirect()->intended('/dashboard');
                    }
                }
            }
    }
}