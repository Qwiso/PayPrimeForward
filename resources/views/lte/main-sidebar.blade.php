<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
{{--                <img src="{{auth()->user()->avatar}}" class="img-circle" alt="User Image">--}}
            </div>
            <div class="pull-left info">
                {{--<p>{{auth()->user()->username}}</p>--}}
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
                <li><a href="{{url('music')}}"><i class="fas fa-fw fa-music"></i> <span>Music</span></a></li>
            {{--<li><a href="{{isset(auth()->user()->steam_id) ? url('steam') : url('auth/steam')}}"><i class="fa fa-fw fa-steam"></i> <span>Steam</span></a></li>--}}
            {{--<li><a href="{{isset(auth()->user()->twitchalerts_access_token) ? url('twitchalerts') : url('auth/twitchalerts')}}"><i class="fa fa-fw fa-flag-o"></i> <span>TwitchAlerts</span></a></li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>