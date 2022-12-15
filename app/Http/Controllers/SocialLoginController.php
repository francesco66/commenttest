<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    // GOOGLE LOGIN
    public function GoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function GoogleLogin()
    {

    $user = Socialite::driver('google')->stateless()->user();
    // dd($user);

    $user = User::updateOrCreate([
        'provider_id' => $user->id,
        ], [
        'name' => $user->name,
        'email' => $user->email,
        // 'provider_token' => $user->token,
        // 'provider_refresh_token' => $user->refreshToken,
        'avatar' => $user->getAvatar(),
        // password
        'password' => bcrypt('password@1234')
    ]);

    Auth::login($user);

    return redirect('/dashboard');    
    }

    // FACEBOOK LOGIN
    public function FacebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function FacebookLogin()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        // dd($user);

        $user = User::updateOrCreate([
            'provider_id' => $user->id,
            ], [
            'name' => $user->name,
            'email' => $user->email,
            // 'provider_token' => $user->token,
            // 'provider_refresh_token' => $user->refreshToken,
            'avatar' => $user->getAvatar(),
            // password
            'password' => bcrypt('password@1234')
        ]);

        Auth::login($user);

        return redirect('/dashboard');    
    }
/*
    // OAuth 2.0 providers...   GOOGLE
    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;
 
    // OAuth 1.0 providers...   FACEBOOK
    $token = $user->token;
    $tokenSecret = $user->tokenSecret;
 
    // All providers...
    $user->getId();
    $user->getNickname();
    $user->getName();
    $user->getEmail();
    $user->getAvatar();
*/

}
