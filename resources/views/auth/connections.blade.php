@extends('templates.main')

@section('content')

@endsection

@section('post-script')
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1937649023192086',
            cookie     : true,
            xfbml      : true,
            version    : 'v3.0',
            status     : true
        });

        FB.Event.subscribe('auth.statusChange', function(response) {
            if (response.status == "not_authorized") return;

            data.facebook_id = response.authResponse.userID;

            FB.api(
                    '/me/?fields=id,name,email',
                    'GET',
                    {},
                    function(response) {
                        data.email = response.email;
                        data.name = response.name;
                        data._token = "{{csrf_token()}}";

                        console.log(response);
                        {{----}}
                        {{--$.post("{{url('login')}}", data, function(req) {--}}
                            {{--if (req.status == 'connected') window.location.href = "{{url('/')}}";--}}
                        {{--});--}}
                    }
            );
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endsection