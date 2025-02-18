<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid mx-lg-4">
        <a style="font-family:serif;" class="navbar-brand" href="{{ route('home') }}">Kitaab<span
                style="color: red;"><b>Nama</b></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('singlepost', '2') }}">Single Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
        @if (Auth::check())
            <a style="border-radius: 2px 10px 0px 10px" class="btn btn-outline-dark fst-italic"
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-regular fa-user"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a style="border-radius: 2px 10px 0px 10px" class="btn btn-outline-primary fst-italic"
                href="{{ route('login') }}">
                Login Now
            </a>
        @endif

    </div>
</nav>
