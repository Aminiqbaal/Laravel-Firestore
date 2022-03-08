<div class="navbar-bg" style="height: 70px"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="{{ route('index') }}" class="navbar-brand sidebar-gone-hide">Stisla</a>
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"></a>
    </div>
    <ul class="navbar-nav navbar-right ml-auto">
        @if(Auth::check())
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block"><i class="far fa-user"></i> {{ Auth::user()->username }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item has-icon text-danger" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @else
        <a href="{{ route('login') }}" class="nav-link">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
        @endif
    </ul>
</nav>
