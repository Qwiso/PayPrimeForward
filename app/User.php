<?php

namespace App;

use Carbon\Carbon;
use Facebook\Facebook;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'twitch_prime_verified_at',
        'twitch_subscription_verified_at'
    ];

    public function verifySubscription() {
        $user = auth()->user();
        try {
            $url = "https://api.twitch.tv/kraken/users/$user->twitch_name/subscriptions/$user->referral_name/?client_id=gw8ni3wps3lkd03qd4q9gfhpne7pqd&oauth_token=$user->twitch_access_token";

            $data = json_decode(file_get_contents($url));
            auth()->user()->twitch_subscription_verified = 1;
            auth()->user()->twitch_subscription_verified_at = Carbon::now();
            auth()->user()->save();
            if (isset($data->sub_plan)) return true;

            auth()->user()->twitch_subscription_verified = 0;
            auth()->user()->twitch_subscription_verified_at = Carbon::now();
            auth()->user()->save();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
        return false;
    }

    public function verifyPrime($retry = false)
    {
        $directory = public_path('/js/twitch_prime_verify.js');
        $user_id = auth()->id();
        $user = auth()->user()->twitch_name;
        $auth = auth()->user()->twitch_access_token;
        $botAuth = User::find(1)->twitch_access_token;

        $output = trim(shell_exec("sudo -S /home/ec2-user/.nvm/versions/node/v8.11.3/bin/node $directory $user_id $user $auth $botAuth 2>&1"));
        \Log::info($output);

        if ($output == 'true')
        {
            auth()->user()->twitch_prime_verified = 1;
            auth()->user()->twitch_prime_verified_at = Carbon::now();
            auth()->user()->save();
            return true;
        } else {
            if ($output == 'false')
            {
                auth()->user()->twitch_prime_verified = 0;
                auth()->user()->twitch_prime_verified_at = Carbon::now();
                auth()->user()->save();
                return false;
            }

            if ($output != 'true' && $retry == false)
            {
                $botUser = User::find(1);
                $refresh_token = $botUser->twitch_refresh_token;

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://id.twitch.tv/oauth2/token?grant_type=refresh_token&refresh_token=$refresh_token&client_id=gw8ni3wps3lkd03qd4q9gfhpne7pqd&client_secret=m2m9033jheh01ozrmebb4g0vjx3rhc",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $data = json_decode($response);
                    $botUser->twitch_access_token = $data->access_token;
                    $botUser->twitch_refresh_token = $data->refresh_token;
                    $botUser->save();
                }

                auth()->user()->verifyPrime(true);
            }
        }

        return false;
    }
}
