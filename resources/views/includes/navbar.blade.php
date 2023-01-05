<nav class="navbar navbar-expand-lg fixed-top" id="navbar" style="background-color: black">
    <div class="container-fluid">
        <a class="navbar-brand put-gold" href="/">Tips Api</a>
        <button class="navbar-toggler" style="color: goldenrod" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: goldenrod"><i class="fa fa-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.show.register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.show.login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
