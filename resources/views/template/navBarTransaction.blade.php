<header>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black">
    <div class="container">
      <a class="navbar-brand" style="font-weight: bold" href="#">NFS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Game Category
            </a>
            <ul class="dropdown-menu">
                @foreach (\App\Models\Type::all() as $type)
                    <li><a class="dropdown-item" href={{ "/type/{$type->TypeID}" }}>{{ $type->name }}</a></li>
                @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('Transaksi History Page') }}">Transaction History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('View User Profile', [1]) }}">Account</a>
          </li>
          </ul>
                <form class="d-flex justify-content-end" action="{{ route('Search Transaksi') }}">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav me-right mb-2 mb-lg-0 mx-2 d-none">
                    <li class="mx-2">
                        <form class="d-flex" role="register" method="get" action="#">
                            <button disabled class="btn btn-outline-primary" type="submit">Register</button>
                        </form>
                    </li>

                    <li>
                        <form class="d-flex" role="login" method="get" action="#">
                            <button disabled class="btn btn-primary" type="submit">Login</button>
                        </form>
                    </li>
        </ul>
      </div>
    </div>
  </nav>
</header>