<?php

Route::get('/', function () {
    $referral_id = request('referral_id');

    if (auth()->check())
    {
        if (auth()->user()->referral_id != null)
            $referral_id = auth()->user()->referral_id;
    }

    if ($referral_id == null)
        return view('pages.referral');

    if (!auth()->check()) return redirect("facebook/login?referral_id=$referral_id");

    // check for referral_id to be a valid twitch_id
    if (!$user = \App\User::where('twitch_id', $referral_id)->first())
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.twitch.tv/helix/users?id=$referral_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "client-id: ".env('TWITCH_CLIENT_ID'),
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            dd($err);
        } else {
            $data = json_decode($response)->data[0];
            $name = $data->login;
            auth()->user()->referral_name = $name;
            auth()->user()->save();
        }
    } else {
        $name = $user->twitch_name;
    }

    if (auth()->user()->twitch_id == null)
        return view('pages.walkthrough');

    if (auth()->user()->twitch_prime_verified == 0)
        auth()->user()->verifyPrime();

    if (auth()->user()->twitch_prime_verified == 0)
        return view('pages.walkthrough');

    if (auth()->user()->twitch_prime_verified_at->diffInDays() > 14)
        auth()->user()->verifyPrime();

    if (auth()->user()->twitch_subscription_verified == 0)
        auth()->user()->verifySubscription();

    if (auth()->user()->twitch_subscription_verified == 0)
        return view('pages.walkthrough', compact('name'));

    if (auth()->user()->twitch_subscription_verified_at->diffInDays() > 3)
        auth()->user()->verifySubscription();

    return view('pages.walkthrough', compact('name'));
});

Route::get('privacy', function(){
    return view('pages.privacy');
});

Route::get('tos', function(){
    return view('pages.tos');
});

Route::get('logout', function(){
    auth()->logout();
    return redirect('/');
});

Route::group(['prefix' => 'facebook'], function(){
    Route::get('login', 'FacebookController@redirectToProvider');
    Route::get('callback', 'FacebookController@handleProviderCallback');
});

Route::group(['prefix' => 'twitch'], function(){
    Route::get('login', 'TwitchController@redirectToProvider');
    Route::get('callback', 'TwitchController@handleProviderCallback');
    Route::post('verifysubscription', 'TwitchController@verifyTwitchSubscription');
});
