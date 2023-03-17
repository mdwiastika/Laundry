<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('/userpage/images/logo-laundry.png') }}" class="logo img-fluid" alt="">

            <span class="ms-2">Mdwi Laundry</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(url()->current(), 'home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ str_contains(url()->current(), 'paket') ? 'active' : '' }}"
                        href="{{ route('paket-user') }}">Paket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(url()->current(), 'history') ? 'active' : '' }}"
                        href="{{ route('history-user') }}">History</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link">Selamat Datang, {{ auth()->user()->username }}</a>
                </li>

                <li class="nav-item ms-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link custom-btn custom-border-btn custom-btn-bg-white btn"
                            type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
