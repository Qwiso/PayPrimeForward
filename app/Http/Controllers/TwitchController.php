<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class TwitchController extends Controller
{
    public function redirectToProvider()
    {
        if (!auth()->check()) return redirect('/');
        return Socialite::driver('twitch')->scopes(['user_read','chat_login','user_subscriptions'])->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('twitch')->user();

        $authUser = auth()->user();
        $authUser->twitch_id = $user->getId();
        $authUser->twitch_name = $user->getName();
        $authUser->twitch_email = $user->getEmail();
        $authUser->twitch_access_token = $user->token;
        $authUser->twitch_refresh_token = $user->refreshToken or null;
        $authUser->twitch_token_expires = $user->expiresIn;
        $authUser->save();

        return redirect('/');
    }

    public function verifyTwitchSubscription()
    {
        $hmm = auth()->user()->verifySubscription();

        if ($hmm == true)
            return response('verified', 200);

        if ($hmm == false)
            return response('not found', 404);

        return response($hmm, 404);
    }
}
