<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
   public function login()
   {
       return view('pages.login');
   }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        session()->push('loggedUser', $user);
        $this->_registerOrLoginUser($user);
        return redirect('/home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user              = new User();
            $user->name        = $data->name;
            $user->email       = $data->email;
            $user->provider_id = $data->id;
            $user->avatar      = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }

    public function logout()
    {
        session()->pull('loggedUser');
        Auth::logout();
        return redirect('/home');
    }
}

