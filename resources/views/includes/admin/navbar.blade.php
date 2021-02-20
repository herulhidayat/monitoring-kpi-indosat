<div class="page-header">
    <nav class="navbar navbar-expand container">
        <ul class="navbar-nav">
            <li class="nav-item small-screens-sidebar-link">
                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('admin/images/avatars/profile-image-1.png')}}" alt="profile image">
                    <span>Nancy Moore</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Calendar<span class="badge badge-pill badge-info float-right">2</span></a>
                    <a class="dropdown-item" href="#">Settings &amp Privacy</a>
                    <a class="dropdown-item" href="#">Switch Account</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">Log out</a>
                        </form>
                </div>
            </li>
        </ul>
        <div class="navbar-collapse">
            <div class="navbar-nav">
                <div class="logo-box"><a href="#" class="logo-text">monitoring</a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>         
    </nav>
</div>