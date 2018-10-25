@extends('templates.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h3 class="text-center my-3">Welcome to Pay Prime Forward @if (!session('no-login'))<a class="btn btn-block btn-info col-md-3 my-3 float-right" href="{{url('facebook/login?referral_id=241285818')}}">Log In Here?</a>@endif</h3>

        <p class="text-center lead">You appear to have no referrer set!</p>

        <p>The purpose of this website is to ensure that an existing Amazon Prime user (you) is sharing their free Twitch Prime subscription with someone they know (referrer)</p>
        <p>Your goal is to pay prime forward. If you are an Amazon Prime subscriber, part of what you have bought is the power to pay it forward. Each month, your Amazon Prime subscription is worth $2.50 to someone through TwitchTV Prime: that's $30/yr!</p>
        <p>Your referrer will be the target of this walkthough. You should get the link from a person that you know and care about. It will look like this:<br>
            <code>payprimeforward.com?referral_id=123412345</code><br>
            When following a valid referral link, you will not see this page</p>

        <small>
            Developer's Note:<br>
            I built this website after a crushing realization of how many unused Twitch Prime subscriptions exist each month<br>
            Consider giving your slice of the pie to my wonderful friend, Ashleyriott
        </small>

        <a class="btn btn-block btn-twitch col-md-6 offset-md-3 my-3" href="{{url('/?referral_id=23908425')}}"><i class="fa fa-info"></i> Continue with Ashleyriott as referrer?</a>

        <div class="row justify-content-center mt-3">
            <div class="embed-responsive-16by9">
                <div id="twitch-embed" class="embed-responsive-16by9"></div>

                <!-- Load the Twitch embed script -->
                <script src="https://embed.twitch.tv/embed/v1.js"></script>

                <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
                <script type="text/javascript">
                    new Twitch.Embed("twitch-embed", {
                        channel: "ashleyriott",
                        layout: 'video',
                        theme: 'dark',
                        height: 320,
                        width: 480
                    });
                </script>
            </div>
        </div>
        <a class="btn btn-block btn-patreon col-md-6 offset-md-3 my-3" href=""><i class="fab fa-patreon"></i> Developer's Patreon</a>
    </div>
</div>
@endsection