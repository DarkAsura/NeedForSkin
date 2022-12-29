<header>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black">
    <div class="container">
        <div class="Logo">
            <a class="navbar-brand" style="font-weight: bold" href="/">NFS</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Game Category
                    </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    @foreach (\App\Models\Type::all() as $type)
                        <li><a class="dropdown-item" href={{ "/type/{$type->TypeID}" }}>{{ $type->name }}</a></li>
                    @endforeach
                </ul>
                </li>
                    <li class="nav-item">
                        @if (Auth::check() && (Auth::user()->role ==='Member' || Auth::user()->role === 'Admin'))
                            <a class="nav-link" href="{{ route('Transaksi History Page', Auth::user()->id) }}">Transaction History</a>
                            @else
                            <a class="nav-link" href="{{ route('Transaksi History Page', ) }}">Transaction History</a>
                        @endif
                    </li>

                </li>
                <li class="nav-item">
                    @if (Auth::check() && (Auth::user()->role ==='Member' || Auth::user()->role ==='Admin'))
                        <a class="nav-link" href="{{ route('View User Profile', Auth::user()->id) }}">Account</a>
                        @else
                        <a class="nav-link" href="{{ route('View User Profile', ) }}">Account</a>
                    @endif
                </li>
                <li class="nav-item">
                        <form class="d-flex" action="{{ route('Search Game Account') }}">
                            <input name="search" class="form-control me-2" type="search" placeholder="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                </li>
            </div>
        </div>
        <div class="Login-Register-Logout">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                @if (!Auth::check())
                    <form class="d-flex button" role="register" method="get" action="{{ Route('register') }}">
                    <button class="btn btn-outline-primary" type="submit">Register</button>
                    </form>
                    <form class="d-flex button" role="login" method="get" action="{{ Route('login') }}">
                    <button class="btn btn-outline-primary" type="submit">Login</button>
                    </form>
                @else
                    <form class="d-flex button" role="logout" method="post" action="{{ Route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit">Logout</button>
                    </form>
                 @endif
                </div>
        </div>
    </div>
  </nav>
</header>
