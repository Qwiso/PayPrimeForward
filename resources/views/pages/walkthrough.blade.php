@extends('templates.main')

@section('content')
<div class="row justify-content-center">
    <div class="position-sticky ml-3">Your referrer is: {{auth()->user()->referral_name}}</div>
    <div class="col">
        <div class="text-center p-3">
            @if(!auth()->check())
                <h1>Part 1</h1>
                <p class="lead mb-0">Connect an existing Facebook account</p>
                <small>Read each step below. When you're ready to go, click the button at the bottom</small>
                <div class="mt-2 row justify-content-center">
                    <ul class="list-group">
                        <li class="list-group-item mb-5">
                            <div class="row">
                                <div class="col-3">
                                    What You See:
                                </div>
                                <div class="col-9">
                                    <img src="/img/facebook_login_1.png" class="img-fluid">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    What You Do:
                                </div>
                                <div class="col-9">
                                    <p>Log In to your Facebook account</p>
                                    <small>or click Create New Account</small>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item mb-5">
                            <div class="row">
                                <div class="col-3">
                                    What You See:
                                </div>
                                <div class="col-9">
                                    <img src="/img/facebook_connect_1.png" class="img-fluid">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    What You Do:
                                </div>
                                <div class="col-9">
                                    <p>Click Continue as [Your Name] to return to our website</p>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item mb-5">
                            <div class="row">
                                <div class="col">
                                    <p class="lead text-center">If you are ready, click the button to continue</p>
                                    <a class="btn btn-block btn-facebook mb-5" href="{{url("facebook/login?referral_id=$referral_id")}}">Connect to <i class="fab fa-facebook"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            @else
                @if(auth()->user()->twitch_id == null)
                    <h1>Part 2</h1>
                    <p class="lead mb-0">Create and Connect a TwitchTV account</p>
                    <small>Read each step below. When you're ready to go, click the button at the bottom</small>
                    <div class="mt-2 row justify-content-center">
                        <ul class="list-group">
                            <li class="list-group-item mb-5">
                                <div class="row">
                                    <div class="col-3">
                                        What You See:
                                    </div>
                                    <div class="col-9">
                                        <img src="/img/twitch_login_1.png" class="img-fluid">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        What You Do:
                                    </div>
                                    <div class="col-9">
                                        <p>Log In to your TwitchTV account</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item mb-5">
                                <div class="row">
                                    <div class="col-3">
                                        What You See:
                                    </div>
                                    <div class="col-9">
                                        <img src="/img/twitch_register.png" class="img-fluid">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        What You Do:
                                    </div>
                                    <div class="col-9">
                                        <p>Fill in the boxes to create a TwitchTV account</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item mb-5">
                                <div class="row">
                                    <div class="col-3">
                                        What You See:
                                    </div>
                                    <div class="col-9">
                                        <img src="/img/twitch_connect_1.png" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        What You Do:
                                    </div>
                                    <div class="col-9">
                                        <p>Click 'Authorize' to be returned to our website</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item mb-5">
                                <div class="row">
                                    <div class="col">
                                        <p class="lead text-center">If you are ready, click the button to continue</p>
                                        <a class="btn btn-block btn-twitch mb-5" href="{{url('twitch/login')}}">Connect to <i class="fab fa-twitch"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                @else
                    @if(auth()->user()->twitch_prime_verified == 0)
                        <h1>Step 3</h1>
                        <small>Read each step below<br>When you're ready to go, click the button at the bottom</small>
                        <div class="mt-2 row justify-content-center">
                            <ul class="list-group">
                                <li class="list-group-item mb-5">
                                    <div class="row">
                                        <div class="col-3">
                                            What You See:
                                        </div>
                                        <div class="col-9">
                                            <img src="/img/twitch_prime_connect_1.png" class="img-fluid mb-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            What You Do:
                                        </div>
                                        <div class="col-9">
                                            <p>Click on "Try Twitch Prime" to continue</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item mb-5">
                                    <div class="row">
                                        <div class="col-3">
                                            What You See:
                                        </div>
                                        <div class="col-9">
                                            <img src="/img/twitch_prime_connect_2.png" class="img-fluid mb-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            What You Do:
                                        </div>
                                        <div class="col-9">
                                            <p>Click on your flag to continue</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item mb-5">
                                    <div class="row">
                                        <div class="col-3">
                                            What You See:
                                        </div>
                                        <div class="col-9">
                                            <img src="/img/twitch_prime_connect_3.png" class="img-fluid mb-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            What You Do:
                                        </div>
                                        <div class="col-9">
                                            <p>Click 'Continue' to continue</p>
                                            <small>Clicking on a flag shows the cost of Twitch Prime but <b>you will NOT be billed. You never have to enter payment info</b>. You are avoiding this cost by using Amazon Prime!</small>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item mb-5">
                                    <div class="row">
                                        <div class="col-3">
                                            What You See:
                                        </div>
                                        <div class="col-9">
                                            <img src="/img/amazon_sign_in.png" class="img-fluid mb-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            What You Do:
                                        </div>
                                        <div class="col-9">
                                            <p>Sign In to Amazon to continue</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item mb-5">
                                    <div class="row">
                                        <div class="col-3">
                                            What You See:
                                        </div>
                                        <div class="col-9">
                                            <img src="/img/twitch_prime_connect_4.png" class="img-fluid mb-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            What You Do:
                                        </div>
                                        <div class="col-9">
                                            <p>Click 'Confirm' to continue</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item mb-5">
                                    <div class="row">
                                        <div class="col-3">
                                            What You See:
                                        </div>
                                        <div class="col-9">
                                            <img src="/img/twitch_prime_connect_5.png" class="img-fluid mb-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            What You Do:
                                        </div>
                                        <div class="col-9">
                                            <p>Return to this website or refresh the page when you are finished</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item mb-5">
                                    <div class="row">
                                        <div class="col">
                                            <p class="lead text-center">If you are ready, click the button to continue</p>
                                            <a class="btn btn-block btn-amazon mb-5" href="https://www.twitch.tv/prime" target="_blank">Connect to <i class="fab fa-amazon btn-amazon"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @else
                        @if(auth()->user()->twitch_subscription_verified == 0)
                            <h1>Part 4</h1>
                            <p class="lead mb-0">You're almost done! The last step is to use your free subscription</p>
                            <small>Read each step below. When you're ready to go, click the button at the bottom</small>
                            <div class="mt-2 row justify-content-center">
                                <ul class="list-group">
                                    <li class="list-group-item mb-5">
                                        <div class="row">
                                            <div class="col-3">
                                                What You See:
                                            </div>
                                            <div class="col-9">
                                                <img src="/img/twitch_prime_subscribe.png" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                What You Do:
                                            </div>
                                            <div class="col-9">
                                                <p>Click on "Subscribe Free" and confirm! Return to this page and use the "Verify Subscription" button to complete the walkthough!</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item mb-5">
                                        <div class="row">
                                            <div class="col-3">
                                                Did you already Subscribe?:
                                            </div>
                                            <div class="col-9">
                                                <a class="btn btn-block btn-info text-white" onclick="verifyTwitchSubscription(this)">Click here to verify that you are subscribed to your referrer</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item mb-5">
                                        <div class="row">
                                            <div class="col">
                                                <p class="lead text-center">If you are ready, click the button to continue</p>
                                                <a class="btn btn-block btn-twitch mb-5" href="https://twitch.tv/{{auth()->user()->referral_name}}">Visit {{auth()->user()->referral_name}}'s <i class="fab fa-twitch"></i> Channel</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @else
                            You're fucking done, mate! Cheers!<br>
                            Your subscription lasts for 30 days, so check back to keep paying it forward!
                        @endif
                    @endif
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
@section('post-script')
<script>
    $(function(){
        $("#carousel").carousel({interval: 0, ride: false});
    });

    function verifyTwitchSubscription(element)
    {
        var data = {};
        data._token = "{{csrf_token()}}";
        $.post("{{url('twitch/verifysubscription')}}", data, function(res){
            if (res == 'verified') {
                location.reload();
            }

            if (res == 'not found') {

            }
        });
    }
</script>
@endsection