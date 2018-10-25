<?php

namespace App\Http\Controllers;

use App\User;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        \Session::flash('referral_id', request('referral_id'));
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $referral_id = \Session::get('referral_id');
        if ($referral_id == null) return redirect('/');

        $authUser = Socialite::driver('facebook')->user();

        if (!$user = User::where('facebook_email', $authUser->getEmail())->first())
        {
            if ($referral_id == '241285818') //prevent new registration for what are considered login attempts
                return redirect('/')->with('no-login', 'true');

            $user = new User();
            $user->name = $authUser->getName();
            $user->referral_id = $referral_id;
            $user->facebook_id = $authUser->getId();
            $user->facebook_email = $authUser->getEmail();
            $user->facebook_access_token = $authUser->token;
            $user->facebook_refresh_token = $authUser->refreshToken or null;
            $user->facebook_token_expires = $authUser->expiresIn;
            $user->save();
        }

        auth()->login($user);

        return redirect('/');
    }
}
