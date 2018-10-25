@extends('templates.main')

@section('content')
<div class="row mb-5 text-center">
    <div class="col">
        <p class="lead">You're almost done! The last step is to use your free Twitch Prime subscription to benefit your referrer<br>
            Click the heart and subscribe to complete your walkthrough!</p>
        <div id="twitch-embed" class="embed-responsive-16by9"></div>
        <script src="https://embed.twitch.tv/embed/v1.js"></script>
        <script type="text/javascript">
            new Twitch.Embed("twitch-embed", {
                height: 320,
                width: 480,
                channel: "{{$name}}",
                layout: 'video',
                theme: 'dark'
            });
        </script>
    </div>
</div>
@endsection