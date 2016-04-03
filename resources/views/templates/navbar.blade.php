<nav class="navbar navbar-default navbar-highlight">
<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <i class="fa fa-bars fa-fw"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a class="navtext-home" href="{{ route('app::index') }}">
                Home
            </a></li>
            <li><a class="navtext-news" href="{{ route('app::news') }}">
                News & Updates
            </a></li>
            <li><a class="navtext-events" href="{{ route('app::events') }}">
                Events
            </a></li>
            <li><a class="navtext-organizations" href="{{ route('app::organizations') }}">
                Organizations
            </a></li>
            <li><a class="navtext-recipients" href="{{ route('app::recipients') }}">
                Recipients
            </a></li>
            @if (Auth::check())
            <li><a class="navtext-volunteers" href="{{ route('app::volunteers') }}">
                Volunteers
            </a></li>
            <li><a class="navtext-logout" href="{{ url('/logout') }}">
                Logout
            </a></li>
            @else
            <li><a class="navtext-login" href="{{ url('/login') }}">
                Login
            </a></li>
            @endif
        </ul>
    </div>
</div>
</nav>
