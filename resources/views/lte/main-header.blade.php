<header class="main-header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="{{url('/')}}" class="logo">
            <span class="logo-lg"><b>PayPrime</b>FORWARD</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    Welcome, {{ auth()->user()->name }}
                </li>
            </ul>
        </div>
    </nav>
</header>